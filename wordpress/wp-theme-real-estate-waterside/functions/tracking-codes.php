<?php 

/* 
 * Add tracking code to page
 * Types:
 *      1: Add tc before body tag (default)
 *      2: Add tc right after body tag
 *      3: Add tc before end body tag
 */
function tracking_code($type = 1)
{
    do_action('tracking_code', $type);
}

function add_tracking_code($type)
{
    $tc_placement = 'extra_html_before_body_tag';

    if ($type == 2) {
        $tc_placement = 'extra_html_right_after_body_tag';
    }

    if ($type == 3) {
        $tc_placement = 'extra_html_before_end_body_tag';
    }

    $tc = get_field($tc_placement);

    if (isset($tc)) {
        echo $tc;
    }

    $tc_general = get_field($tc_placement, 'options');

    if (isset($tc_general)) {
        echo $tc_general;
    }

}

add_action('tracking_code', 'add_tracking_code', 10, 1);
