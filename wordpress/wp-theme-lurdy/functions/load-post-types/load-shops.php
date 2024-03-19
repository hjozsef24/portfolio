<?php
function load_shops()
{

    $current_page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $term_id = $_POST['term_id'];
    $letter = $_POST['letter'];
    $keyword = $_POST['keyword'];

    $placeholder = array(
        'url' => get_template_directory_uri() . '/src/assets/images/placeholder.png',
        'title' => 'Placeholder',
        'alt' => 'Placeholder'
    );

    $query_args = array(
        'posts_per_page' => 24,
        'post_type'      => 'shops-cpt',
        'post_status'    => 'publish',
        'orderby'        => 'title',
        'order'          => 'ASC',
        'fields'         => 'ids',
        'paged'          => $current_page,
    );

    if ($letter) {
        $query_args['starts_with'] = $letter;
    }

    if($keyword){
        $query_args['s'] = $keyword;
    }


    if ($term_id) {
        $query_args['tax_query'][] = array(
            array(
                'taxonomy' => 'shops-taxonomy',
                'field' => 'term_id',
                'terms' => $term_id
            )
        );
    }

    $query = new WP_Query($query_args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            $logo = get_field('logo', $post_id);
            $logo = $logo ? $logo : $placeholder;
            $title = get_the_title();
            $permalink = get_the_permalink();
            $shop_card_args = compact('logo', 'title', 'permalink');
            get_template_part('template-parts/02_molecules/cards/m-card-shop', '', $shop_card_args);
        }
    } else {
        echo '<h4 class="not--found">' . __('A keresésnek nincs megfelelő elem.', 'lurdy') . '</h4>';
    }

    wp_reset_postdata();
    wp_die();
}

function add_starts_with($where, $query)
{
    global $wpdb;

    $starts_with = esc_sql($query->get('starts_with'));

    if ($starts_with) {
        $where .= " AND $wpdb->posts.post_title LIKE '$starts_with%'";
    }

    return $where;
}
add_filter('posts_where', 'add_starts_with', 10, 2);

add_action('wp_ajax_load_shops', 'load_shops');
add_action('wp_ajax_nopriv_load_shops', 'load_shops');
