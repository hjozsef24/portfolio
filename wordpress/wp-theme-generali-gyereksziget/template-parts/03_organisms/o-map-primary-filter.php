<?php
$places = get_terms(
    'programs-category-places',
    array(
        'hide_empty' => true,
        'orderby'    => 'name',
        'order'      => 'ASC',
    )
);
?>
<div class="js-map-primary-filter map--primary-filter">
    <?php set_query_var('places', $places); ?>
    <?php get_template_part('template-parts/02_molecules/m-map-primary-filter'); ?>
</div>