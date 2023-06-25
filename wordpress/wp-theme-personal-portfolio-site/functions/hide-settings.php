<?php

// Remove default post types
function remove_default_post_type()
{
    remove_menu_page('edit.php'); // Remove built in post type
    remove_menu_page('edit-comments.php'); // Remove comments
}

add_action('admin_menu', 'remove_default_post_type');

// Removes unnecessary settings from admin bar
function mytheme_admin_bar_render()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments'); // Remove comments
}

add_action('wp_before_admin_bar_render', 'mytheme_admin_bar_render');
