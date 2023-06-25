<?php

// Change the footer text
function change_admin_footer()
{
    echo 'Hajdu József Portfolio - CMS Admin Theme by Hajdu József.';
}
add_filter('admin_footer_text', 'change_admin_footer');


// Change the login logo URL and title
function change_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'change_login_logo_url');


function change_login_logo_url_title()
{
    return 'Hajdu József Portfolio';
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


function enqueue_brusher_script()
{
	wp_enqueue_script(
		'brusher',
		get_template_directory_uri() . '/assets/js/custom-login/brusher.min.js',
		null,
		null,
		true
	);
	wp_enqueue_script(
		'init-brusher',
		get_template_directory_uri() . '/assets/js/custom-login/brusher.js',
		array('brusher'),
		null,
		true
	);
	wp_localize_script('init-brusher', 'localize', array(
		'themeurl' => get_template_directory_uri(),
	));
}

add_action('login_enqueue_scripts', 'enqueue_brusher_script');



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


// Custom favicon
function add_favicon()
{
    echo '<link rel="shortcut icon" type="image/x-icon" href="' . site_url() . '/favicon/favicon.ico" />';
}

add_action('admin_head', 'add_favicon');
add_action('login_head', 'add_favicon');


// Made by
function my_addition_to_login_footer()
{
    echo '<p class="madebylove">Made by <a href="https://hajdujozsef.hu/" target="_blank"><strong>Hajdu József</strong></a> with love.</p>';
}

add_action('login_footer', 'my_addition_to_login_footer');