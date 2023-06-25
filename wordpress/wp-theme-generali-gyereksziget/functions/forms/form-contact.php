<?php

function contact_form()
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

    if (!isset($data['topic']) || empty($data['topic']) || $data['topic'] == "default") {
        $status   = "error";
        $fields[] = array(
            'field'   => 'topic',
            'message' =>  __('Kérjük válasszon kategóriát!', 'gyereksziget')
        );
    }

    if (!isset($data['fullname']) || empty($data['fullname'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'fullname',
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

    if (isset($data['phone']) && !empty($data['phone'])) {
        if (strlen($data['phone']) < 6) {
            $fields[] = array(
                'field' => 'phone',
                'message' => $error_message_format
            );
        }
    }

    if (!isset($data['message']) || empty($data['message'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'message',
            'message' => $error_message_required
        );
    }

    if (!isset($data['contact-gdpr'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'contact-gdpr',
            'message' => $error_message_required
        );
    }

    if ($status == "success") {
        $order   = 0;
        $form_name = "Kapcsolat form";

        $vals = array(
            'Topic'          => $data['topic'],
            'Teljes név'     => $data['fullname'],
            'E-mail cím'     => $data['email'],
            'Telefonszám'    => $data['phone'] ? $data['phone'] : __('Nem lett megadva', 'gyereksziget'),
            'Cégnév'         => $data['company'] ? $data['company'] : __('Nem lett megadva', 'gyereksziget'),
            'Üzenet'         => $data['message'],
            'GDPR'           => true,
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
    }

    $return_value = ([
        'status' => $status,
        'fields' => $fields,
    ]);

    echo json_encode($return_value);

    wp_die();
}

add_action('wp_ajax_contact_form', 'contact_form');
add_action('wp_ajax_nopriv_contact_form', 'contact_form');
