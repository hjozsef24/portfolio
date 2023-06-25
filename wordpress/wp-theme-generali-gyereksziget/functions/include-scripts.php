<?php
define('ASSETS_VERSION', '0.0.0.7');


function include_scripts()
{
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style('custom-font-open-sans', $protocol . '://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap', false);

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

    wp_localize_script('main-js', "localize", array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'themeurl' => THEME_URI,
        'siteurl' => SITE_URL,
        'language' =>  ICL_LANGUAGE_CODE,
        'map_data' =>  get_map_data_to_json(),
        'program_cards_liked_button_url' => ASSETS_URI_IMG_SVG . "/icon-heart-filled.svg",
        'program_cards_unliked_button_url' => ASSETS_URI_IMG_SVG . "/icon-heart.svg",
    ));
}

add_action('wp_enqueue_scripts', 'include_scripts');