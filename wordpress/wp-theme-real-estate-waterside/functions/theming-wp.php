<?php

// Hide WP version
remove_action('wp_head', 'wp_generator');

// Change the login logo URL and title
function change_login_logo_url()
{
    return home_url();
}

add_filter('login_headerurl', 'change_login_logo_url');

function change_login_logo_url_title()
{
    return 'Festival Theme 2023';
}

add_filter('login_headertext', 'change_login_logo_url_title');

// Style the login page
function change_login_stylesheet()
{
    wp_enqueue_style(
        'custom-login',
        get_stylesheet_directory_uri() . '/assets/css/custom-login/custom-login.css',
        null,
        ASSETS_VERSION
    );
}

add_action('login_enqueue_scripts', 'change_login_stylesheet');

// Disable the password reset feature
function disable_reset_pwd()
{
    return false;
}

add_filter('allow_password_reset', 'disable_reset_pwd');

// Remove error shake
function remove_shake()
{
    remove_action('login_head', 'wp_shake_js', 12);
}

add_action('login_head', 'remove_shake');

// Hide login error messages (wrong password, no such user etc.)
add_filter('login_errors', 'hide_login_errors');

function hide_login_errors()
{
    return null;
};

// Custom favicon
function add_favicon()
{
    echo '<link rel="shortcut icon" type="image/x-icon" href="' . site_url() . '/favicon/favicon.ico" />';
}

add_action('admin_head', 'add_favicon');
add_action('login_head', 'add_favicon');


// Style the admin page
function my_admin_theme_style()
{
    wp_enqueue_style('my-admin-theme', get_stylesheet_directory_uri() . '/assets/css/custom-admin/custom-admin.css', null, ASSETS_VERSION);
}

add_action('admin_enqueue_scripts', 'my_admin_theme_style');