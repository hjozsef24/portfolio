<?php

// Function to query the products by ACF product_type meta data
function get_products_by_type($posts_per_page, $order, $order_by, $product_type, $not_in = false)
{
    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'post__not_in'   => $not_in,
        'posts_per_page' => $posts_per_page,
        'order'          => $order,
        'orderby'        => $order_by,
        'meta_query'     => array(
            array(
                'key'       => 'product_type',
                'value'     => $product_type,
                'compare'   => '=',
            )
        ),
    );

    $results = new WP_Query($args);
    return $results;
}

function modify_product_cat_query($query)
{
    if (!is_admin() && $query->is_tax("product_cat")) {
        $query->set('posts_per_page', 9);
    }
}
add_action('pre_get_posts', 'modify_product_cat_query');
