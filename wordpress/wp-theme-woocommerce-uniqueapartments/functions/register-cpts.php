<?php

function register_custom_post_types()
{
    // References
    $labels = array(
        'name'          => 'References',
        'singular_name' => 'References'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-multisite',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'references'),
        'supports'            => array('title')
    );

    register_post_type('references-cpt', $args);



    // Developments
    $labels = array(
        'name'          => 'Developments',
        'singular_name' => 'Development'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-building',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'developments'),
        'supports'            => array('title')
    );

    register_post_type('developments-cpt', $args);
    
    
    // Homes for sale
    $labels = array(
        'name'          => 'Homes for sale',
        'singular_name' => 'Home for sale'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-home',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'homes-for-sale'),
        'supports'            => array('title')
    );

    register_post_type('homes-for-sale-cpt', $args);
}

add_action('init', 'register_custom_post_types');
