<?php
function verify_sent_contact_lead($customer_id)
{
    $url = 'https://cms.realpad.eu/ws/v10/get-customer-details';

    $post_data['login'] = 'api-login';
    $post_data['password'] = 'api-password';
    $post_data['customerid'] = $customer_id;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $result = curl_exec($ch);

    curl_close($ch);

    return json_decode($result);
}

function send_contact_lead_to_api($post_data)
{
    $url = 'https://cms.realpad.eu/ws/v10/create-lead';
    $post_id = $post_data['apartment_id'];

    $post_data['login'] = 'api-login';
    $post_data['password'] = 'api-password';
    $post_data['screenid'] = '1234';
    $post_data['developerid'] = '1234';
    $post_data['projectid'] = '1234';
    $post_data['internalid'] = get_post_meta($post_id, 'api_flat_id');
    $post_data['internalid'] = $post_data['internalid'][0];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $result = curl_exec($ch);

    curl_close($ch);

    return $result;
}

function submit_contact_form()
{
    global $wpdb;
    $error_message_required = __('The field is required', 'waterside');
    $error_message_format = __('Invalid format', 'waterside');

    $data = array();
    foreach (@$_POST['datas'] as $i) {
        $data[$i['name']] = $i['value'];
    }

    $data['apartment_id'] = $_POST['apartment_id'];

    $status = "success";
    $fields = array();


    if (!isset($data['name']) || empty($data['name'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'name',
            'message' => $error_message_required
        );
    }

    if (!isset($data['surname']) || empty($data['surname'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'surname',
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

    if (!isset($data['phone']) || empty($data['phone'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'phone',
            'message' => $error_message_required
        );
    } elseif (isset($data['phone']) && !empty($data['phone'])) {
        if (strlen($data['phone']) < 6) {
            $fields[] = array(
                'field' => 'phone',
                'message' => $error_message_format
            );
        }
    }

    if (!isset($data['note']) || empty($data['note'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'note',
            'message' => $error_message_required
        );
    }

    if (!isset($data['gdpr'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'gdpr',
            'message' => $error_message_required
        );
    }

    if ($status == "success") {
        $order   = 0;
        $form_name = "Contact Form";

        $vals = array(
            'Name'            => $data['name'] . $data['firstname'],
            'E-mail address'  => $data['email'],
            'Phone number'    => $data['phone'],
            'Message'         => $data['note'],
        );

        foreach ($vals as $k1 => $v1) {
            $wpdb->insert("done_submits", array(
                'submit_time' => strtotime(current_time('Y-m-d H:i:s')),
                'form_name' => $form_name,
                'field_name' => $k1,
                'field_value' => $v1,
                'field_order' => $order
            ));
            $order++;
        }

        if ($data['apartment_id']) {
            $customer_id = send_contact_lead_to_api($data);
            $lead_verification = verify_sent_contact_lead($customer_id);
            if (is_object($lead_verification)) {
                $return_value = ([
                    'status' => $status,
                    'fields' => $fields,
                ]);

                echo json_encode($return_value);

                wp_die();
            } 
        }
    }

    $return_value = ([
        'status' => $status,
        'fields' => $fields,
    ]);

    echo json_encode($return_value);

    wp_die();
}

add_action('wp_ajax_submit_contact_form', 'submit_contact_form');
add_action('wp_ajax_nopriv_submit_contact_form', 'submit_contact_form');
