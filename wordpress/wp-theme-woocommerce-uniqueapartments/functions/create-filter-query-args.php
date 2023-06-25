<?php

function create_product_filter_query_args($category_id)
{
    $meta_query = [];
    $tax_query = [];
    $filter_type = get_field('filter_type', 'product_cat_' . $category_id);
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;


    $args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'term_id',
                'terms' => $category_id,
            ),
            array(
                'taxonomy' => 'product_visibility',
                'field' => 'slug',
                'terms' => 'exclude-from-catalog',
                'operator' => 'NOT IN'
            )
        ),
        'paged' => $paged
    );

    $meta_query[] = array(
        'key'       => 'product_type',
        'value'     =>  $filter_type,
        'compare'   => '=',
    );

    if (isset($_GET['project']) && $_GET['project'] !== 'default') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_project',
                'terms'     =>  $_GET['project'],
                'field'     => 'term_id',
            ),
        );
    }

    if (isset($_GET['completion']) && $_GET['completion'] !== 'default') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_year-of-completion',
                'terms'     =>  $_GET['completion'],
                'field'     => 'term_id',
            ),
        );
    }

    if (isset($_GET['floor']) && $_GET['floor'] !== 'default') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_floor',
                'terms'     =>  $_GET['floor'],
                'field'     => 'term_id',
            ),
        );
    }

    if (isset($_GET['bedrooms-min']) && isset($_GET['bedrooms-max']) && $_GET['bedrooms-min'] !== ""  && $_GET['bedrooms-max'] !== "") {
        $terms_range = range($_GET['bedrooms-min'], $_GET['bedrooms-max']);
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_number-of-rooms',
                'terms'     =>  $terms_range,
                'field'     => 'name',
            ),
        );
    } elseif (isset($_GET['bedrooms-min']) && $_GET['bedrooms-min'] !== "" && $_GET['bedrooms-max'] == "") {
        $terms_range = range($_GET['bedrooms-min'], 100);
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_number-of-rooms',
                'terms'     =>  $terms_range,
                'field'     => 'name',
            ),
        );
    } elseif ($_GET['bedrooms-min'] == "" && isset($_GET['bedrooms-max']) && $_GET['bedrooms-max'] !== "") {
        $terms_range = range(0, $_GET['bedrooms-max']);
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_number-of-rooms',
                'terms'     =>  $terms_range,
                'field'     => 'name',
            ),
        );
    }

    if (isset($_GET['size-min']) && $_GET['size-min'] !== "" && isset($_GET['size-max']) && $_GET['size-max'] !== "") {
        $terms_range = range($_GET['size-min'], $_GET['size-max'], 0.01);
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_size',
                'terms'     =>  $terms_range,
                'field'     => 'slug',
            ),
        );
    } elseif (isset($_GET['size-min']) && $_GET['size-min'] !== "" && $_GET['size-max'] == "") {
        $terms_range = range($_GET['size-min'], 100, 0.01);
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_size',
                'terms'     =>  $terms_range,
                'field'     => 'slug',
            ),
        );
    } elseif ($_GET['size-min'] == "" && isset($_GET['size-max']) && $_GET['size-max'] !== "") {
        $terms_range = range(0, $_GET['size-max'], 0.01);
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_size',
                'terms'     =>  $terms_range,
                'field'     => 'slug',
            ),
        );
    }

    if (isset($_GET['balcony']) && $_GET['balcony'] == 'on') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_balcony',
                'terms'     => 'true',
                'field'     => 'slug',
            ),
        );
    }

    if (isset($_GET['garden']) && $_GET['garden'] == 'on') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_garden',
                'terms'     => 'true',
                'field'     => 'slug',
            ),
        );
    }

    if (isset($_GET['price-min']) && $_GET['price-min'] !== "") {
        $_GET['price-min'] = preg_replace('/\s+/', '', $_GET['price-min']);

        $meta_query[]  = array(
            array(
                'key'       => '_price',
                'value'     =>  $_GET['price-min'],
                'compare'   => '>=',
                'type'      => 'NUMERIC',
            ),
        );
    }

    if (isset($_GET['price-max']) && $_GET['price-max'] !== "") {
        $_GET['price-max'] = preg_replace('/\s+/', '', $_GET['price-max']);

        $meta_query[]  = array(
            array(
                'key'       => '_price',
                'value'     =>  $_GET['price-max'],
                'compare'   => '<=',
                'type'      => 'NUMERIC',
            ),
        );
    }

    if (isset($_GET['city-region']) && $_GET['city-region'] !== "") {
        $meta_query[] =  array(
            'key'       => 'location_region',
            'value'     =>  $_GET['city-region'],
            'compare'   => 'LIKE',
        );
    }

    if (isset($_GET['apartment']) && $_GET['apartment'] !== 'default') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_apartments',
                'terms'     =>  $_GET['apartment'],
                'field'     => 'term_id',
            ),
        );
    }

    if (isset($_GET['style']) && $_GET['style'] !== 'default') {
        $tax_query[]  = array(
            array(
                'taxonomy'  => 'pa_style',
                'terms'     =>  $_GET['style'],
                'field'     => 'term_id',
            ),
        );
    }


    $args['meta_query'] = array(
        'relation'      => 'AND',
        $meta_query
    );

    if (!empty($tax_query)) {
        $args['tax_query'] = array(
            'relation' => 'AND',
            $tax_query
        );
    }

    return $args;
}

function create_development_filter_query_args()
{
    $meta_query = [];

    if (isset($_GET['city-region']) && $_GET['city-region'] !== "") {
        $meta_query[] =  array(
            'key'       => 'location_region',
            'value'     =>  $_GET['city-region'],
            'compare'   => 'LIKE',
        );
    }

    if (isset($_GET['completion']) && $_GET['completion'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'completion_date',
                'value'     =>  $_GET['completion'],
                'compare'   => 'LIKE',
            ),
        );
    }

    if (isset($_GET['bedrooms-min']) && $_GET['bedrooms-min'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'bedrooms',
                'value'     =>  $_GET['bedrooms-min'],
                'type'      => 'NUMERIC',
                'compare'   => '>=',
            ),
        );
    }

    if (isset($_GET['bedrooms-max']) && $_GET['bedrooms-max'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'bedrooms',
                'value'     =>  $_GET['bedrooms-max'],
                'type'      => 'NUMERIC',
                'compare'   => '<=',
            ),
        );
    }

    if (isset($_GET['price-min']) && $_GET['price-min'] !== "") {
        $_GET['price-min'] = preg_replace('/\s+/', '', $_GET['price-min']);
        $meta_query[]  = array(
            array(
                'key'       => 'price',
                'value'     =>  $_GET['price-min'],
                'type'      => 'NUMERIC',
                'compare'   => '>=',
            ),
        );
    }

    if (isset($_GET['price-max']) && $_GET['price-max'] !== "") {
        $_GET['price-max'] = preg_replace('/\s+/', '', $_GET['price-max']);

        $meta_query[]  = array(
            array(
                'key'       => 'price',
                'value'     =>  $_GET['price-max'],
                'type'      => 'NUMERIC',
                'compare'   => '<=',
            ),
        );
    }

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'developments-cpt',
        'post_status' => 'publish',
        'posts_per_page' => 9,
        'order' => 'DESC',
        'orderby' => 'date',
        'paged' => $paged
    );

    if (!empty($meta_query)) {
        $args['meta_query'] = array(
            'relation'      => 'AND',
            $meta_query
        );
    }

    return $args;
}