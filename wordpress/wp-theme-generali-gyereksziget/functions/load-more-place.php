<?php
function load_more_place()
{
    $all_terms = wp_count_terms('programs-category-places');
    $offset = $_POST['data']['offset'];
    
    if($offset >= $all_terms){
        return;
    }

    $number = $all_terms - $offset;

    $terms = get_terms(
        'programs-category-places',
        array(
            'hide_empty' => true,
            'orderby'    => 'name',
            'order'      => 'ASC',
            'offset'     => $offset,
            'number'     => $number,
        )
    );
?>

    <?php foreach ($terms as $term) : ?>
        <?php $term_id = $term->term_id; ?>
        <div class="col-3 js-places">
            <?php get_places_card($term_id, 'programs-category-places'); ?>
        </div>
    <?php endforeach; ?>

<?php
    wp_die();
}

add_action('wp_ajax_load_more_place', 'load_more_place');
add_action('wp_ajax_nopriv_load_more_place', 'load_more_place');
