<?php
define('ASSETS_VERSION', '0.0.0.7');


function add_scripts()
{

    wp_enqueue_style(
        'vendor-css',
        get_template_directory_uri() . '/assets/css/vendor.min.css',
        null,
        ASSETS_VERSION
    );
    wp_enqueue_style(
        'main-css',
        get_template_directory_uri() . '/assets/css/style.min.css',
        array('vendor-css'),
        ASSETS_VERSION
    );

    wp_enqueue_script('jquery');

    wp_enqueue_script(
        'vendor-js',
        get_template_directory_uri() . '/assets/js/vendor.min.js',
        array('jquery'),
        ASSETS_VERSION,
        true
    );
    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.min.js',
        array('vendor-js'),
        ASSETS_VERSION,
        true
    );


    wp_enqueue_script(
        'delayed-vendor-js',
        get_template_directory_uri()  . '/assets/js/delayed/vendor.min.js',
        array('jquery'),
        ASSETS_VERSION,
        true
    );
    
    wp_enqueue_script(
        'delayed-main-js',
        get_template_directory_uri()  . '/assets/js/delayed/main.min.js',
        array('vendor-js'),
        ASSETS_VERSION,
        true
    );



    wp_localize_script('main-js', "localize", array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'themeurl' => THEME_URI,
        'siteurl' => SITE_URL,
    ));
}

add_action('wp_enqueue_scripts', 'add_scripts');