<?php

function get_user_country_by_ip()
{
    $output = NULL;
    $ip = file_get_contents("http://ipecho.net/plain");
    $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
    $output = @$ipdat->geoplugin_countryName;
    return $output;
}


function send_subscribe_lead($data)
{
    $url = 'https://cloud.news.szigetfestival.com/subscribe-gyereksziget';
    $country = get_user_country_by_ip();
    $current_language = apply_filters('wpml_current_language', NULL);

    $post_fields = [
        'email' => $data['email'],
        'first-name' => $data['firstname'],
        'last-name' => $data['lastname'],
        'domain' => $data['domain'],
        'event' => $data['event'],
        'brand' => $data['brand'],
        'name' => $data['firstname'] . " " .  $data['lastname'],
        'country' => $country,
        'language' => $current_language,
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
    $result = curl_exec($ch);
    curl_close($ch);

    $obj = json_decode($result);

    return $obj;
}

function newsletter_form()
{
    global $wpdb;

    $error_message_required = __('A mező kitöltése kötelező', 'gyereksziget');
    $error_message_format = __('Nem megfelelő formátum', 'gyereksziget');

    $data = array();
    foreach (@$_POST['datas'] as $i) {
        $data[$i['name']] = $i['value'];
    }

    $status = "success";
    $fields = array();

    if (!isset($data['firstname']) || empty($data['firstname'])) {
        $status   = "error";
        $fields[] = array(
            'field'   => 'firstname',
            'message' => $error_message_required
        );
    }

    if (!isset($data['lastname']) || empty($data['lastname'])) {
        $status   = "error";
        $fields[] = array(
            'field'   => 'lastname',
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

    if (!isset($data['newsletter-age'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'newsletter-age',
            'message' => $error_message_required
        );
    }

    if (!isset($data['newsletter-gdpr'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'newsletter-gdpr',
            'message' => $error_message_required
        );
    }

    if ($status == "success") {
        $order   = 0;
        $form_name = "Hírlevél form";

        $vals = array(
            'Vezetéknév'     => $data['lastname'],
            'Keresztnév'     => $data['firstname'],
            'E-mail cím'     => $data['email'],
            'GDPR'           => true,
            'Elmúlt 16 éves' => true
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

        $data['brand'] = 'Gyerek Sziget';
        $data['event'] = 'Gyerek Sziget 2023';
        $data['domain'] = $_SERVER['SERVER_NAME'];

        $subscribe_status = send_subscribe_lead($data);
        $is_subscribed = true;

        if ($subscribe_status->code != "200") {
            $is_subscribed = false;
        }

        $success_subscribed_email_header = "MIME-Version: 1.0" . "\r\n";
        $success_subscribed_email_header .= "Content-Type: text/html; charset=utf-8\n";
        $success_subscribed_email_subject = get_field('newsletter_subscribed_email_subject', 'options');
        $success_subscribed_email_content = get_field('newsletter_subscribed_email_content', 'options');

        wp_mail(
            $data['email'],
            $success_subscribed_email_subject,
            $success_subscribed_email_content,
            $success_subscribed_email_header
        );
    }

    $return_value = ([
        'status' => $status,
        'fields' => $fields,
        'is_subscribed' => $is_subscribed
    ]);

    echo json_encode($return_value);

    wp_die();
}

add_action('wp_ajax_newsletter_form', 'newsletter_form');
add_action('wp_ajax_nopriv_newsletter_form', 'newsletter_form');
