<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('menus');

    register_nav_menus(array(
        'header_nav' => 'Header Menü',
        'footer_nav' => 'Footer Menü',
        'footer_subnav' => 'Footer Almenü'
    ));
});

// Remove default post types
function remove_default_post_type()
{
    remove_menu_page('edit.php'); // Remove built in post type
    remove_menu_page('edit-comments.php'); // Remove comments
}
add_action('admin_menu', 'remove_default_post_type');

/*Hide WP version*/
remove_action('wp_head', 'wp_generator');

/*Change the footer text*/
function change_admin_footer()
{
    echo 'ADMIN THEME by DONE.';
}

add_filter('admin_footer_text', 'change_admin_footer');

/*Change the login form logo*/

function enqueue_my_script()
{
    wp_localize_script('custom', 'localize', array(
        'themeurl' => get_template_directory_uri(),
    ));
}
add_action('login_enqueue_scripts', 'enqueue_my_script');

/*Change the login logo URL and title*/
function change_login_logo_url()
{
    return home_url();
}

add_filter('login_headerurl', 'change_login_logo_url');

function change_login_logo_url_title()
{
    return 'Lurdy Login Theme';
}

add_filter('login_headertitle', 'change_login_logo_url_title');

/*Style the login page*/
function change_login_stylesheet()
{
    wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/css/custom-login/custom-login.css');
}

add_action('login_enqueue_scripts', 'change_login_stylesheet');

function my_admin_theme_style()
{
    wp_enqueue_style('my-admin-theme', get_stylesheet_directory_uri() . '/src/assets/css/custom-admin/custom-admin.css');
    wp_enqueue_style('font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap', array(), null);
}

add_action('admin_enqueue_scripts', 'my_admin_theme_style');


function my_theme_add_editor_styles()
{
    add_editor_style(get_stylesheet_directory_uri() . '/src/assets/css/custom-admin/custom-editor.css');
}

add_action('init', 'my_theme_add_editor_styles');

// Made by DONE.
function my_addition_to_login_footer()
{
    echo '<img src="' . asset('circle-green.svg', '', 'images/decors') . '" alt="Decor" class="decor--first">';
    echo '<img src="' . asset('circle-blue-whole.svg', '', 'images/decors') . '" alt="Decor" class="decor--second">';
    echo '<img src="' . asset('circle-grey.svg', '', 'images/decors') . '" alt="Decor" class="decor--third">';
}

add_action('login_footer', 'my_addition_to_login_footer');
