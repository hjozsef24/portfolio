<?php

//Theme setup
function theme_setup()
{
    add_theme_support('title-tag');

    load_theme_textdomain('ua');

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'header_menu' => 'Header menu',
        'footer_menu' => 'Footer menu',
        'footer_submenu' => 'Footer submenu'
    ));
}
add_action('after_setup_theme', 'theme_setup');