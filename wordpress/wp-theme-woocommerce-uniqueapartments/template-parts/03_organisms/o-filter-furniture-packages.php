<?php
$apartments = [];
$styles = [];

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'term_id',
            'terms' => $category_id,
        ),
        array(
            'taxonomy' => 'product_visibility',
            'field' => 'slug',
            'terms' => 'exclude-from-catalog',
            'operator' => 'NOT IN'
        )
    ),
);

$query = new WP_Query($args);

$post_ids = wp_list_pluck($query->posts, 'ID');

foreach ($post_ids as $post_id) {
    $apartments[] = get_the_terms($post_id, 'pa_apartments');
    $styles[] = get_the_terms($post_id, 'pa_style');
}

?>

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-12">
                <div class="filter--furniture-packages filter-modal js-filter-modal">
                    <div class="filter-modal--header">
                        <p><?php _e('Filtering', 'ua'); ?></p>
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-close.svg" alt="" class="js-toggle-filter-modal">
                    </div>
                    <form class="js-filter-form filter-form">
                        <?php if ($apartments) : ?>
                            <?php set_query_var('apartments', $apartments); ?>
                        <?php endif; ?>

                        <?php if ($styles) : ?>
                            <?php set_query_var('styles', $styles); ?>
                        <?php endif; ?>

                        <?php set_query_var('bedrooms', true); ?>
                        <?php set_query_var('price', true); ?>
                        <?php get_template_part('template-parts/02_molecules/m-filter-filters'); ?>
                    </form>
                    <div class="d-md-block d-none">
                        <?php set_query_var('counted_results', $counted_results); ?>
                        <?php get_template_part('template-parts/01_atoms/filters/a-filter-counter'); ?>
                    </div>
                </div>
                <div class="d-md-none d-flex justify-content-between align-items-center">
                    <?php set_query_var('counted_results', $counted_results); ?>
                    <?php get_template_part('template-parts/01_atoms/filters/a-filter-counter'); ?>

                    <?php get_template_part('template-parts/01_atoms/filters/a-filter-toggle-button'); ?>
                </div>

                <div class="d-md-none d-flex justify-content-between align-items-center">
                    <?php get_template_part('template-parts/01_atoms/filters/a-reset-filters'); ?>
                </div>
            </div>
        </div>
    </div>
</section>