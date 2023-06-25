<?php

function send_form()
{
    global $wpdb;
    $data = array();
    $status = "success";
    $requiredError = __('A mező kitöltése kötelező.', 'hajdujozsef');

    foreach (@$_POST['datas'] as $i) {
        $data[$i['name']] = $i['value'];
    }

    if (!isset($data['fullname']) || empty($data['fullname'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'fullname',
            'message' => $requiredError,
        );
    }

    if (!isset($data['email']) || empty($data['email'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'email',
            'message' => $requiredError,
        );
    } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $status   = "error";
        $fields[] = array(
            'field' => 'email',
            'message' => __('Nem megfelelő e-mail cím formátum.', 'hajdujozsef'),
        );
    }

    if (!isset($data['phone']) || empty($data['phone'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'phone',
            'message' => $requiredError,
        );
    }

    if (!isset($data['message']) || empty($data['message'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'message',
            'message' => $requiredError,
        );
    }

    if (!isset($data['gdpr']) || $data['gdpr'] !== 'on') {
        $status   = "error";
        $fields[] = array(
            'field' => 'gdpr',
            'message' =>  __('Az adatkezelési tájékoztató elfogadása kötelező!', 'hajdujozsef'),
        );
    }

    if ($status == "success") {
        $wpdb->insert(SUBMITS_DATABASE_TABLE, array(
            'submit_time'  => date('Y-m-d H:i:s'),
            'name'         => $data['fullname'],
            'company_name' => $data['companyname'],
            'email'        => $data['email'],
            'phone'        => $data['phone'],
            'message'      => $data['message'],
            'cv'           => $data['cv'] ? 1 : 0,
            'gdpr'         => 1
        ));

        $mail_to = get_field('mail_to', 'options');
        
        if ($mail_to) {
            $mail_header = "MIME-Version: 1.0" . "\r\n";
            $mail_header .= "Content-Type: text/html; charset=utf-8\n";

            $mail_subject = "Kapcsolatfelvétel";

            $mail_body = "";
            $mail_body .= "Név: " . $data['fullname'] . '<br/>';
            $mail_body .= "Cégnév: " . $data['companyname'] . '<br/>';
            $mail_body .= "E-mail cím: " . $data['email'] . '<br/>';
            $mail_body .= "Telefonszám: " . $data['phone'] . '<br/>';
            $mail_body .= "Üzenet: " . $data['message'] . '<br/>';
            $mail_body .= "CV: " . $data['cv'] . '<br/>';
            $mail_body .= '<br/>';
            $mail_body .= "Küldési idő: " . date("Y.m.d H:i:s", time());

            wp_mail($mail_to, $mail_subject, $mail_body, $mail_header);
        }
    }

    $return_value = ([
        'status' => $status,
        'fields' => $fields
    ]);

    echo json_encode($return_value);

    wp_die();
}

add_action('wp_ajax_send_form', 'send_form');
add_action('wp_ajax_nopriv_send_form', 'send_form');
