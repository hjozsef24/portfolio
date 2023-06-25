<?php
function get_in_touch_form()
{
    global $wpdb;
    $error_message_required = __('A mező kitöltése kötelező', 'ua');
    $error_message_format = __('Nem megfelelő formátum', 'ua');
    $data = array();
    foreach (@$_POST['datas'] as $i) {
        $data[$i['name']] = $i['value'];
    }

    $status = "success";
    $fields = array();


    if (!isset($data['name']) || empty($data['name'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'name',
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

    if (!isset($data['message']) || empty($data['message'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'message',
            'message' => $error_message_required
        );
    }

    if (isset($data['gdpr-active']) && !isset($data['gdpr'])) {
        $status   = "error";
        $fields[] = array(
            'field' => 'gdpr',
            'message' => $error_message_required
        );
    }

    if ($status == "success") {
        $order   = 0;
        $form_name = "Get In Touch";

        $vals = array(
            'Name'            => $data['name'],
            'E-mail address'  => $data['email'],
            'Phone number'    => $data['phone'],
            'Message'         => $data['message'],
            'Topic'           => $data['topic']
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

add_action('wp_ajax_get_in_touch_form', 'get_in_touch_form');
add_action('wp_ajax_nopriv_get_in_touch_form', 'get_in_touch_form');
