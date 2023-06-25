<?php 

/* Add extra conditional logic for ACF display rules */
function acf_location_rules_types($choices)
{
    $choices['Other']['taxonomy_depth'] = 'Taxonómia szint';
    return $choices;
}

function acf_location_rules_operators($choices)
{
    //BY DEFAULT WE HAVE == AND !=
    $choices['<'] = 'is less than';
    $choices['>'] = 'is greater than';
    return $choices;
}

function acf_location_rules_values_taxonomy_depth($choices)
{
    for ($i = 0; $i < 6; $i++) {
        $choices[$i] = $i;
    }
    return $choices;
}

function acf_location_rules_match_taxonomy_depth($match, $rule, $options)
{
    $depth = intval($rule['value']);
    if (isset($_GET['taxonomy']) && isset($_GET['tag_ID'])) {
        $term_depth = count(get_ancestors($_GET['tag_ID'], $_GET['taxonomy']));
    }
    if ($rule['operator'] == '==') {
        $match = ($depth == $term_depth);
    } elseif ($rule['operator'] == '!=') {
        $match = ($depth == $term_depth);
    } elseif ($rule['operator'] == '<') {
        $match = ($term_depth < $depth);
    } elseif ($rule['operator'] == '>') {
        $match = ($term_depth > $depth);
    }
    return $match;
}

add_filter('acf/location/rule_types', ('acf_location_rules_types'));
add_filter('acf/location/rule_operators', ('acf_location_rules_operators'));
add_filter('acf/location/rule_values/taxonomy_depth', ('acf_location_rules_values_taxonomy_depth'));
add_filter('acf/location/rule_match/taxonomy_depth', ('acf_location_rules_match_taxonomy_depth'), 10, 3);


/* Add limitation for taxonomy fields */
function limit_highlighted_places_taxonomy_field($valid, $value) {
    if( $valid !== true ) {
        return $valid;
    }

    if(sizeof($value) > 4) {
		$valid = 'Elértük a mező maximális értékét (legfeljebb 4)';
	} else {
		$valid = true;
	}
    return $valid;
}

add_filter('acf/validate_value/key=field_641ac7f03116c', 'limit_highlighted_places_taxonomy_field', 10, 2);

