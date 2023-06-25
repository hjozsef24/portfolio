<?php

//Theme setup
function theme_setup()
{
    add_theme_support('title-tag');

    load_theme_textdomain('gyereksziget');

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'header_menu' => 'Fejléc menü',
        'footer_menu' => 'Lábléc menü'
    ));
}
add_action('after_setup_theme', 'theme_setup');