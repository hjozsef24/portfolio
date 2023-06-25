<?php
define('ASSETS_VERSION', '0.0.0.9');

function add_scripts()
{
    $protocol = is_ssl() ? 'https' : 'http';

    wp_enqueue_style('custom-font-montserrat', $protocol . '://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap', false);
    wp_enqueue_style('vendor-css', get_template_directory_uri() . '/assets/css/vendor.min.css', null, ASSETS_VERSION);
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/css/style.min.css', array('vendor-css'), ASSETS_VERSION);

    wp_enqueue_script('jquery');
    wp_enqueue_script('vendor-js', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), ASSETS_VERSION, true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/main.min.js', array('vendor-js'), ASSETS_VERSION, true);


    wp_localize_script('main-js', "localize", array(
        'ajax_url'       => admin_url('admin-ajax.php'),
        'success_form_submit_page_url' => get_template_link('template-success-form-submit.php')
    ));
}

add_action('wp_enqueue_scripts', 'add_scripts');
