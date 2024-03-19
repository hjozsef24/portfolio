<?php
function load_news_events() {

    $current_page = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $post_not_in = isset($_POST['post_not_in']) ? intval($_POST['post_not_in']) : 0;
    $selected_news_events = isset($_POST['selected_news_events']) ? $_POST['selected_news_events'] : [];

    $query_args = array(
        'posts_per_page' => 6,
        'post_type'      => array('news-cpt', 'events-cpt'),
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
        'paged'          => $current_page,
        'post__not_in'   => array($post_not_in),
    );

    if (!empty($selected_news_events)) {
        $query_args['post__in'] = $selected_news_events;
    }

    $query = new WP_Query($query_args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            output_card_data(get_the_ID());
        }
    }

    wp_reset_postdata();
    wp_die();
}

function output_card_data($post_id) {
    $title = get_the_title($post_id);
    $permalink = get_permalink($post_id);
    $post_type = get_post_type($post_id);
    $highlighted_image = get_field('highlighted_image', $post_id);
    $excerpt = $dates = $places = $websites = false;

    if ($post_type === 'news-cpt') {
        $excerpt = get_field('excerpt', $post_id);
    } elseif ($post_type === 'events-cpt') {
        $dates = get_field('dates', $post_id);
        $places = get_field('places', $post_id);
        $websites = get_field('websites', $post_id);
    }

    $card_args = compact('title', 'permalink', 'highlighted_image', 'excerpt', 'dates', 'places', 'websites');
    get_template_part('template-parts/02_molecules/cards/m-card-news-events', '', $card_args);
}

add_action('wp_ajax_load_news_events', 'load_news_events');
add_action('wp_ajax_nopriv_load_news_events', 'load_news_events');