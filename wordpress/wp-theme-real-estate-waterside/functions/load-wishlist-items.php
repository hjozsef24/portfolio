<?php

function load_wishlist_items()
{
    $wishlist_items = $_POST['data'];
    $response = [];

    foreach ($wishlist_items as $id) {
        $attributes = get_apartment_data($id);
        $title = get_the_title($id);
        $building = $attributes['building'];
        $floor = $attributes['floor'];
        $gross_area = $attributes['flat_area'];

        $name = $building ? $title . ' - ' . $building : $title;
        $floor = $floor . '. ' . __('floor', 'waterside');
        $gross_area = $gross_area . ' m<sup>2</sup>';

        $attributes =  $floor . ', ' . $gross_area;

        $two_dimension_blueprint = get_field('two_dimension_blueprint', $id);
        $three_dimension_blueprint = get_field('three_dimension_blueprint', $id);
        $image = $two_dimension_blueprint ? $two_dimension_blueprint : $three_dimension_blueprint;

        $response[] = array(
            'id' => $id,
            'name' => $name,
            'image' => $image['url'],
            'attributes' => $attributes
        );
    }


    echo json_encode($response);
    wp_die();
}

add_action('wp_ajax_load_wishlist_items', 'load_wishlist_items');
add_action('wp_ajax_nopriv_load_wishlist_items', 'load_wishlist_items');
