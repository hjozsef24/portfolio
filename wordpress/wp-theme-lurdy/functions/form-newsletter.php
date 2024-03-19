<?php

/* Mailchimp subscription */

/**
 * @param  $data
 * @param  $status
 * @param  $list_id
 * @param  $api_key
 * @param  array      $merge_fields
 * @return mixed
 */
function subscriber_status($data, $status, $list_id, $api_key)
{
    $post_data = array(
        'apikey'        => $api_key,
        'email_address' => $data['email'],
        'status'        => $status,
        'merge_fields' => array(
            'FNAME'         => $data['firstname']
        )
    );

    $mch_api = curl_init(); // initialize cURL connection

    curl_setopt($mch_api, CURLOPT_URL, 'https://' . substr($api_key, strpos($api_key, '-') + 1) . '.api.mailchimp.com/3.0/lists/' . $list_id . '/members/' . md5(strtolower($post_data['email_address'])));
    curl_setopt($mch_api, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic ' . base64_encode('user:' . $api_key)));
    curl_setopt($mch_api, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($mch_api, CURLOPT_RETURNTRANSFER, true); // return the API response
    curl_setopt($mch_api, CURLOPT_CUSTOMREQUEST, 'PUT'); // method PUT
    curl_setopt($mch_api, CURLOPT_TIMEOUT, 10);
    curl_setopt($mch_api, CURLOPT_POST, true);
    curl_setopt($mch_api, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($mch_api, CURLOPT_POSTFIELDS, json_encode($post_data)); // send data in json

    $result = curl_exec($mch_api);
    return $result;
}


function submit_newsletter_form()
{
    global $wpdb;
    $time = time();
    $data = array();

    $error_message_required = __('A mező kitöltése kötelező!', 'lurdy');
    $error_message_format = __('Nem megfelelő formátum!', 'lurdy');

    $gdpr_checkbox_text = get_field('gdpr_checkbox_text', 'options');

    foreach (@$_POST['datas'] as $i) {
        $data[$i['name']] = $i['value'];
    }

    $status = "success";

    if (trim($data['firstname']) == '') {
        $status   = "error";
        $fields[] = array(
            'field' => 'firstname',
            'message' => $error_message_required
        );
    }

    if (!isset($data['email']) || empty($data['email'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'email',
            'message' => $error_message_required
        );
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $status   = "error";
        $fields[] = array(
            'field' => 'email',
            'message' => $error_message_format
        );
    }

    if ($gdpr_checkbox_text) {
        if ($data['gdpr'] != 'on') {
            $status   = "error";
            $fields[] = array(
                'field' => 'gdpr',
                'message' => $error_message_required
            );
        }
    }

    if ($status == "success") {
        $api_key = get_field('mailchimp_api_key', 'options');
        $list_id = $_POST['list_id'];

        $order   = 0;
        $subject = "Hírlevél";

        $vals = array(
            'Name' => $data['first_name'],
            'E-mail address' => $data['email'],
            'GDPR'       => true,
        );

        ignore_user_abort(true);
        foreach ($vals as $k1 => $v1) {
            $wpdb->insert(
                "done_submits",
                array(
                    'submit_time' => $time,
                    'form_name' => $subject,
                    'field_name' => $k1,
                    'field_value' => $v1,
                    'field_order' => $order
                )
            );
            $order++;
        }

        $result = json_decode(subscriber_status($data, 'subscribed', $list_id, $api_key));

        if ($result->status == 400) {
            $status = "error";
        } elseif ($result->status == 'subscribed') {
            $status = "success";
        }
    }

    $return_value = ([
        'status' => $status,
        'fields' => $fields,
    ]);

    echo json_encode($return_value);
    wp_die();
}

add_action('wp_ajax_submit_newsletter_form', 'submit_newsletter_form');
add_action('wp_ajax_nopriv_submit_newsletter_form', 'submit_newsletter_form');
