<?php

function register_post_types()
{
    // Offers
    $labels = array(
        'name'          => 'Ajánlatok',
        'singular_name' => 'Ajánlat'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-money',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'ajanlatok'),
        'supports'            => array('title')
    );

    register_post_type('offers-cpt', $args);

    // Offers
    $labels = array(
        'name'          => 'Üzletek',
        'singular_name' => 'Üzlet'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-store',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'uzletek'),
        'supports'            => array('title')
    );

    register_post_type('shops-cpt', $args);

    // News
    $labels = array(
        'name'          => 'Hírek',
        'singular_name' => 'Hír'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-welcome-widgets-menus',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'supports'            => array('title'),
        'rewrite'             => array('slug' => 'hirek'),
    );

    register_post_type('news-cpt', $args);

    // Events
    $labels = array(
        'name'          => 'Események',
        'singular_name' => 'Esemény'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-megaphone',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => true,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'esemenyek'),
        'supports'            => array('title')
    );

    register_post_type('events-cpt', $args);

    // Banner
    $labels = array(
        'name'          => 'Banner',
        'singular_name' => 'Banner'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-feedback',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => false,
        'rewrite'             => false,
        'show_in_rest'        => true,
        'show_ui'             => true,
        'has_archive'         => false,
        'supports'            => array('title'),
    );

    register_post_type('banner-cpt', $args);


    // F.A.Q.
    $labels = array(
        'name'          => 'Gy.I.K.',
        'singular_name' => 'Gy.I.K.'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-editor-help',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => false,
        'rewrite'             => false,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'supports'            => array('title'),
    );

    register_post_type('faq-cpt', $args);

    // App Promotion
    $labels = array(
        'name'          => 'Alkalmazás promóció',
        'singular_name' => 'Alkalmazás promóció'
    );

    $args = array(
        'labels'              => $labels,
        'menu_icon'           => 'dashicons-smartphone',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_in_nav_menus'   => false,
        'rewrite'             => false,
        'show_ui'             => true,
        'show_in_rest'        => true,
        'has_archive'         => false,
        'supports'            => array('title'),
        'menu_position'       => 35
    );

    register_post_type('app-promotion-cpt', $args);
}

add_action('init', 'register_post_types');

function register_custom_taxonomies()
{
    register_taxonomy(
        'shops-taxonomy',
        'shops-cpt',
        array(
            'labels'            => array(
                'name'      => 'Üzletkategóriák',
                'all_items' => 'Üzletkategóriák',
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_admin_column' => false,
            'show_ui' => true,
            'show_in_quick_edit' => false,
            'meta_box_cb' => false,
        )
    );

    register_taxonomy(
        'shops-coupons',
        'shops-cpt',
        array(
            'labels'            => array(
                'name'      => 'Utalványok',
                'all_items' => 'Utalványok',
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_admin_column' => false,
            'show_ui' => true,
            'show_in_quick_edit' => false,
            'meta_box_cb' => false,
        )
    );

    register_taxonomy(
        'shops-payment-methods',
        'shops-cpt',
        array(
            'labels'            => array(
                'name'      => 'Fizetési módok',
                'all_items' => 'Fizetési módok',
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_admin_column' => false,
            'show_ui' => true,
            'show_in_quick_edit' => false,
            'meta_box_cb' => false,
        )
    );

    register_taxonomy(
        'faq-taxonomy',
        'faq-cpt',
        array(
            'labels'            => array(
                'name'      => 'Kategóriák',
                'all_items' => 'Kategóriák',
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_admin_column' => false,
            'show_ui' => true,
            'show_in_quick_edit' => false,
            'meta_box_cb' => false,
        )
    );
}

add_action('init', 'register_custom_taxonomies');
