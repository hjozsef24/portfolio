<?php
function set_default_relationship_value($field)
{
    if (is_admin() && isset($_GET['post']) && get_post_type($_GET['post']) == 'offers-cpt') {
        $current_post_id = $_GET['post'];
        $field['value'] = array($current_post_id);
    }
    return $field;
}
add_filter('acf/load_field/key=field_65cf56987a37f', 'set_default_relationship_value');

function populate_mailchimp_list_selector($field)
{
    $field['choices'] = array();
    $mailchimp_lists = get_field('mailchimp_lists', 'options');

    if ($field['key'] == 'field_65e1d98f5c11c' && $mailchimp_lists){
        foreach ($mailchimp_lists as $list) {
            $label = isset($list['name']) ? $list['name'] : '';
            $key = isset($list['id']) ? $list['id'] : '';
            $field['choices'][$key] = $label;
        }
    }
    
    return $field;
}
add_filter('acf/load_field/key=field_65e1d98f5c11c', 'populate_mailchimp_list_selector');
