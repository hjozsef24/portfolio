<?php
function create_apartment_filter_query_args()
{
    $meta_query = [];

    if (isset($_GET['rooms']) && $_GET['rooms'] !== "") {
        $rooms[] = $_GET['rooms'];
        $rooms = $rooms[0];

        $meta_query[] =  array(
            'key'       => 'api_rooms',
            'value'     =>  $rooms,
            'compare'   => 'IN',
        );
    }

    if (isset($_GET['building']) && $_GET['building'] !== "") {
        $buildings[] = $_GET['building'];
        $buildings = $buildings[0];

        $meta_query[]  = array(
            array(
                'key'       => 'api_building',
                'value'     =>  $buildings,
                'compare'   => 'IN',
            ),
        );
    }

    if (isset($_GET['area-min']) && $_GET['area-min'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'api_flat_area',
                'value'     =>  $_GET['area-min'],
                'compare'   => '>=',
            ),
        );
    }

    if (isset($_GET['area-max']) && $_GET['area-max'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'api_flat_area',
                'value'     =>  $_GET['area-max'],
                'compare'   => '<=',
            ),
        );
    }

    if (isset($_GET['floor-min']) && $_GET['floor-min'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'api_floor',
                'value'     =>  $_GET['floor-min'],
                'type'      => 'NUMERIC',
                'compare'   => '>=',
            ),
        );
    }

    if (isset($_GET['floor-max']) && $_GET['floor-max'] !== "") {
        $meta_query[]  = array(
            array(
                'key'       => 'api_floor',
                'value'     =>  $_GET['floor-max'],
                'type'      => 'NUMERIC',
                'compare'   => '<=',
            ),
        );
    }

    if (isset($_GET['balcony']) && $_GET['balcony'] == 'on') {
        $meta_query[]  = array(
            array(
                'key'     => 'api_flat_area_balcony',
                'value'   => null,
                'type'      => 'NUMERIC',
                'compare' => '!='
            ),
        );
    }

    if (isset($_GET['terrace']) && $_GET['terrace'] == 'on') {
        $meta_query[]  = array(
            array(
                'key'     => 'api_flat_area_terrace',
                'value'   => null,
                'type'      => 'NUMERIC',
                'compare' => '!='
            ),
        );
    }

    if (isset($_GET['innergarden']) && $_GET['innergarden'] == 'on') {
        $meta_query[]  = array(
            array(
                'key'     => 'api_flat_area_garden',
                'value'   => null,
                'type'      => 'NUMERIC',
                'compare' => '!='
            ),
        );
    }

    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $args = array(
        'posts_per_page' => 8,
        'post_type' => 'apartments-cpt',
        'post_status' => 'publish',
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
