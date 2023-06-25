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


/* Remove the REST API link tag */
if (has_action('wp_head', 'rest_output_link_wp_head')) {
    remove_action('wp_head', 'rest_output_link_wp_head');
}


/* Remove the type attributes (e.g. type="text/javascript") from the script and style tags that are output by WordPress. */
function myplugin_remove_type_attr($tag, $handle)
{
    return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}
add_filter('style_loader_tag', 'myplugin_remove_type_attr', 10, 2);
add_filter('script_loader_tag', 'myplugin_remove_type_attr', 10, 2);
