<?php

function register_custom_post_types()
{
    // Locations
    $labels = array(
        'name'          => 'Locations',
        'singular_name' => 'Location'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-location-alt',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'has_archive'         => false,
        'rewrite'             => false,
    );

    register_post_type('locations-cpt', $args);

    register_taxonomy(
        'locations-category',
        'locations-cpt',
        array(
            'labels'            => array(
                'name'      => _x('Categories', 'tag-name', 'waterside'),
                'all_items' => _x('Categories', 'tag-all-items', 'waterside'),
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
        )
    );

    // Apartments
    $labels = array(
        'name'          => 'Apartments',
        'singular_name' => 'Apartment'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-multisite',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'apartments'),
        'supports'            => array('title')
    );

    register_post_type('apartments-cpt', $args);

    // Publications
    $labels = array(
        'name'          => 'Publications',
        'singular_name' => 'Publication'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'publications'),
        'supports'            => array('title')
    );

    register_post_type('publications-cpt', $args);

    register_taxonomy(
        'publications-category',
        'publications-cpt',
        array(
            'labels'            => array(
                'name'      => _x('Categories', 'tag-name', 'waterside'),
                'all_items' => _x('Categories', 'tag-all-items', 'waterside'),
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
        )
    );

    // Team
    $labels = array(
        'name'          => 'Team',
        'singular_name' => 'Team'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-admin-users',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'has_archive'         => false,
        'rewrite'             => false,
    );

    register_post_type('team-cpt', $args);

    register_taxonomy(
        'team-category',
        'team-cpt',
        array(
            'labels'            => array(
                'name'      => _x('Titles', 'tag-name', 'waterside'),
                'all_items' => _x('Titles', 'tag-all-items', 'waterside'),
            ),
            'hierarchical'      => true,
            'show_admin_column' => false,
            'show_ui' => true,
            'show_in_quick_edit' => false,
            'meta_box_cb' => false,
        )
    );
}

add_action('init', 'register_custom_post_types');
