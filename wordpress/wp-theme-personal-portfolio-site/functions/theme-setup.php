<?php
function theme_setup()
{
    add_theme_support('title-tag');

    load_theme_textdomain('hajdujozsef');

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'header' => 'Header menu',
        'footer' => 'Footer menu'
    ));
}

add_action('after_setup_theme', 'theme_setup');