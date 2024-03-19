<?php
function load_offers()
{
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';
    $is_paged = isset($_POST['is_paged']) ? filter_var($_POST['is_paged'], FILTER_VALIDATE_BOOLEAN) : false;
    $current_page = isset($_POST['page']) ? absint($_POST['page']) : 1;
    $meta_key = isset($_POST['order_by']) ? sanitize_text_field($_POST['order_by']) : '';
    $posts_per_page = isset($_POST['posts_per_page']) ? absint($_POST['posts_per_page']) : 4;
    $is_filtered = isset($_POST['is_filtered']) ? filter_var($_POST['is_filtered'], FILTER_VALIDATE_BOOLEAN) : false;
    $filter_by = isset($_POST['filter_by']) ? sanitize_text_field($_POST['filter_by']) : '';
    $filter_relation = isset($_POST['filter_relation']) ? sanitize_text_field($_POST['filter_relation']) : '';
    $filter_date = isset($_POST['filter_date']) ? sanitize_text_field($_POST['filter_date']) : '';
    $shop_ids = $_POST['shop_ids'] ? $_POST['shop_ids'] : [];
    $category_ids = $_POST['category_ids'] ? $_POST['category_ids'] : [];
    $shops_in_category = [];


    $paged = $current_page ? $current_page : 1;
    $query_args = array(
        'posts_per_page' => $posts_per_page ? $posts_per_page : 4,
        'post_type'      => 'offers-cpt',
        'post_status'    => 'publish',
        'meta_key'       => $meta_key,
        'orderby'        => 'meta_value',
        'order'          => $order,
        'fields'         => 'ids',
        'paged'          => $is_paged ? $paged : false,
        'meta_query'     => array(
            array(
                'key'     => $meta_key,
                'compare' => 'EXISTS',
            ),
            array(
                'key'     => $meta_key,
                'value'   => '',
                'compare' => '!=',
            ),
        ),
    );
    if ($is_filtered && $filter_by && $filter_date && $filter_relation) {
        $query_args['meta_query'][] = array(
            'key'     => $filter_by,
            'value'   => $filter_date,
            'compare' => $filter_relation,
        );
    } else {
        $query_args['meta_query'][] = array(
            'key'     => 'offer_ends',
            'value'   => date('Y-m-d H:i:s'),
            'compare' => '>=',
        );
    }

    if (!empty($category_ids)) {
        $shops_in_category = get_posts(array(
            'post_type' => 'shops-cpt',
            'tax_query' => array(
                array(
                    'taxonomy' => 'shops-taxonomy',
                    'field' => 'term_id',
                    'terms' => $category_ids
                )
            ),
            'posts_per_page' => -1
        ));
    }

    $all_shop_ids = array_merge($shop_ids, wp_list_pluck($shops_in_category, 'ID'));

    if (!empty($all_shop_ids)) {
        $meta_query = array('relation' => 'OR');
        foreach ($all_shop_ids as $shop_id) {
            $meta_query[] = array(
                'key' => 'related_shop',
                'value' => $shop_id,
                'compare' => 'LIKE'
            );
        }
        $query_args['meta_query'][] = $meta_query;
    }

    $query = new WP_Query($query_args);

    if ($query->have_posts()) {
        while ($query->have_posts()) :
            $query->the_post();
            $post_id = get_the_ID();

            $offer_details = get_offer_details($post_id);

            if (!empty($offer_details)) {
                get_template_part('template-parts/02_molecules/cards/m-card-offer-grid', '', compact('offer_details'));
            }
        endwhile;
    } else {
        echo '<h4 class="not--found">' . __('Az üzletekben jelenleg nem találhatóak aktuális ajánlatok.', 'lurdy') . '</h4>';
    }
    wp_die();
}
add_action('wp_ajax_load_offers', 'load_offers');
add_action('wp_ajax_nopriv_load_offers', 'load_offers');
