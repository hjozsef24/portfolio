<?php
function get_map_data_to_json()
{

    $map_data = array();

    $places = get_terms(array(
        'taxonomy'   => 'programs-category-places',
        'hide_empty' => false,
    ));

    foreach ($places as $place) {
        $programs = array();
        $term_id = $place->term_id;
        $place_id = get_field('map_id', 'programs-category-places_' . $term_id);

        $programs_by_places = get_posts(array(
            'post_type' => 'programs-cpt',
            'numberposts' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'programs-category-places',
                    'field' => 'term_id',
                    'terms' => $term_id,
                )
            )
        ));

        foreach ($programs_by_places as $program) {
            $program_id = $program->ID;

            $program_age = get_the_terms($program_id, 'programs-category-ages');
            $program_age_id = $program_age[0]->term_id;

            $program_type = get_the_terms($program_id, 'programs-category-types');
            $program_type_id = $program_type[0]->term_id;

            $programs[] = array(
                'age_id' => $program_age_id,
                'type_id' => $program_type_id
            );
        }

        $map_data[] = array(
            'place_id' => $place_id,
            'place_name' => $place->name,
            'programs' => $programs
        );
    }

    return json_decode(json_encode($map_data), true);
}
