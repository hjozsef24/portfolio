<?php
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title' => 'Oldal beállításai',
        'menu_title' => 'Oldal beállításai',
        'menu_slug'  => 'theme_settings',
        'capability' => 'edit_posts',
        'position'   => 31,
        'redirect'   => false,
    ));

}