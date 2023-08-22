<?php
function get_filterable_map_locations()
{
    $locations = array();
    $taxonomy = 'locations-category';
    $terms = get_terms($taxonomy, array('hide_empty' => true));

    foreach ($terms as $t) {
        $term_slug = $t->slug;
        $term_id = $t->term_id;
        $term_marker = get_field('marker', 'locations-category_' . $term_id);

        $args = array(
            'post_type' => 'locations-cpt',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field' => 'slug',
                    'terms' => array($term_slug),
                    'operator' => 'IN',
                ),
            ),
        );
        $qry = new WP_Query($args);

        if ($qry->have_posts()) {
            while ($qry->have_posts()) {
                $qry->the_post();

                $id = get_the_ID();
                $location = get_field('location', $id);

                $locations[$term_id][] = array(
                    'id'  => $id,
                    'lat' => $location['markers'][0]['lat'],
                    'lng' => $location['markers'][0]['lng'],
                    'marker' => $term_marker
                );
            }
            wp_reset_query();
        }
    }

    return json_decode(json_encode($locations), true);
}