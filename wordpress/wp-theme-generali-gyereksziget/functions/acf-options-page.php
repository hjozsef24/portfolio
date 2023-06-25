<?php
/* 
This code will add new option pages to the wordpress admin menu 
using Advanced Custom Fields (ACF) plugin
*/

/* Check if the Advanced Custom Fields (ACF) plugin function 'acf_add_options_page' exists */
if (function_exists('acf_add_options_page')) {

    /* If it does, add a new top-level options page 'General settings' to the WordPress admin menu  */
    acf_add_options_page(array(
        'page_title' => _x('Téma beállítások', 'theme-settings', 'gyereksziget'), // The title of the page to be displayed in the browser
        'menu_title' => _x('Téma beállítások', 'theme-settings', 'gyereksziget'), // The text to be used for the menu item
        'menu_slug'  => 'theme_settings',
        'capability' => 'edit_posts',
        'position'   => 31,
        'redirect'   => false,
    ));

    /* Add a sub-page for 'General Tracking codes' under the top-level options page */
    acf_add_options_sub_page(array(
        'page_title' => 'Követőkódok',
        'menu_title' => 'Követőkódok',
        'parent_slug' => 'theme_settings',
    ));
}
