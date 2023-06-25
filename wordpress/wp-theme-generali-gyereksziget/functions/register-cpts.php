<?php

function register_custom_post_types()
{
    //News
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
        'has_archive'         => false,
        'rewrite'             => array('slug' => 'hirek'),
        'supports'            => array('title')
    );

    register_post_type('news-cpt', $args);

    register_taxonomy(
        'news-category',
        'news-cpt',
        array(
            'labels'            => array(
                'name'      => _x('Kategóriák', 'tag-name', 'gyereksziget'),
                'all_items' => _x('Kategóriák', 'tag-all-items', 'gyereksziget'),
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
        )
    );


    //Services
    $labels = array(
        'name'          => 'Szolgáltatások',
        'singular_name' => 'Szolgáltatás'
    );

    $args = array(
        'labels'            => $labels,
        'menu_icon'         => 'dashicons-admin-tools',
        'public'            => true,
        'show_in_nav_menus' => true,
        'rewrite'           => array('slug' => 'szolgaltatasok'),
        'has_archive'       => false,
        'supports'          => array('title', 'page-attributes',),
        'hierarchical'      => true,

    );

    register_post_type('services-cpt', $args);


    //Call To Action
    $labels = array(
        'name'          => 'CTA szekciók',
        'singular_name' => 'CTA szekció'
    );

    $args = array(
        'labels'            => $labels,
        'menu_icon'         => 'dashicons-megaphone',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'has_archive'         => false,
        'rewrite'             => false,

    );

    register_post_type('cta-cpt', $args);


    //Programs
    $labels = array(
        'name'          => 'Programok',
        'singular_name' => 'Program'
    );

    $args = array(
        'labels'            => $labels,
        'menu_icon'         => 'dashicons-album',
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => true,
        'has_archive'         => false,
        'rewrite'           => array('slug' => 'programok'),
        'menu_position'     => 20,
    );

    register_post_type('programs-cpt', $args);

    register_taxonomy(
        'programs-category-places',
        'programs-cpt',
        array(
            'labels'             => array(
                'name'           => _x('Helyszín', 'tag-name', 'gyereksziget'),
                'all_items'      => _x('Összes helyszín', 'tag-all-items', 'gyereksziget'),
            ),
            'hierarchical'       => true,
            'show_admin_column'  => true,
            'rewrite'            => array('slug' => 'program-helyszinek'),
            'show_in_quick_edit' => false,
            'meta_box_cb'        => false,
        )
    );

    register_taxonomy(
        'programs-category-dates',
        'programs-cpt',
        array(
            'labels'             => array(
                'name'           => _x('Időpont', 'tag-name', 'gyereksziget'),
                'all_items'      => _x('Összes időpont', 'tag-all-items', 'gyereksziget'),
            ),
            'hierarchical'       => true,
            'show_admin_column'  => true,
            'show_in_quick_edit' => false,
            'meta_box_cb'        => false,
        )
    );

    register_taxonomy(
        'programs-category-types',
        'programs-cpt',
        array(
            'labels'             => array(
                'name'           => _x('Típus', 'tag-name', 'gyereksziget'),
                'all_items'      => _x('Összes típus', 'tag-all-items', 'gyereksziget'),
            ),
            'hierarchical'       => true,
            'show_admin_column'  => true,
            'show_in_quick_edit' => false,
            'meta_box_cb'        => false,
        )
    );

    register_taxonomy(
        'programs-category-ages',
        'programs-cpt',
        array(
            'labels'             => array(
                'name'           => _x('Életkor', 'tag-name', 'gyereksziget'),
                'all_items'      => _x('Összes életkor', 'tag-all-items', 'gyereksziget'),
            ),
            'hierarchical'       => true,
            'show_admin_column'  => true,
            'show_in_quick_edit' => false,
            'meta_box_cb'        => false,
        )
    );


    //F.A.Q.
    $labels = array(
        'name'          => 'Gy.I.K.',
        'singular_name' => 'Gy.I.K.'
    );

    $args = array(
        'labels'            => $labels,
        'menu_icon'         => 'dashicons-editor-help',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_nav_menus'   => false,
        'has_archive'         => false,
        'rewrite'             => false,
    );

    register_post_type('faq-cpt', $args);

    register_taxonomy(
        'faq-category',
        'faq-cpt',
        array(
            'labels'            => array(
                'name'      => _x('Kategóriák', 'tag-name', 'gyereksziget'),
                'all_items' => _x('Kategóriák', 'tag-all-items', 'gyereksziget'),
            ),
            'hierarchical'      => true,
            'show_admin_column' => true,
        )
    );


    //Quotes
    $labels = array(
        'name'          => 'Idézetek',
        'singular_name' => 'Idézet'
    );

    $args = array(
        'labels'            => $labels,
        'menu_icon'         => 'dashicons-format-quote',
        'public'              => false,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'exclude_from_search' => true,
        'show_in_nav_menus'   => false,
        'has_archive'         => false,
        'rewrite'             => false,
    );

    register_post_type('quotes-cpt', $args);
}

add_action('init', 'register_custom_post_types');


//Function to remove default F.A.Q. category meta box
function remove_faq_category_meta_box()
{
    remove_meta_box('faq-categorydiv', 'faq-cpt', 'side');
}

add_action('admin_menu', 'remove_faq_category_meta_box');
