<?php get_header(); ?>
<?php $term_id = get_queried_object()->term_id; ?>
<?php $title = '<h1>' . get_term($term_id)->name . '</h1>'; ?>
<?php $description = term_description(); ?>
<?php $hero_image = get_field('thumbnail', 'programs-category-places_' . $term_id); ?>
<?php $dates = get_terms('programs-category-dates', array('hide_empty' => true)); ?>

<?php set_query_var('hero_text', $title); ?>
<?php set_query_var('hero_image', $hero_image); ?>
<?php get_template_part('template-parts/03_organisms/o-hero'); ?>

<section class="category-places-taxonomy">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-xl-2 col-xl-5 col-12">
                <div class="description__wrapper">
                    <?php echo $description; ?>
                </div>
            </div>
        </div>
        <?php // Query for the related programs section 
        ?>
        <?php if ($dates) : ?>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-12 custom-spacing">
                    <div class="program-filter">
                        <?php set_query_var('dates', $dates); ?>
                        <?php get_template_part('template-parts/02_molecules/m-related-program-filter'); ?>
                    </div>
                    <h2 id="<?php _e('programok', 'gyereksziget')?>" class="filter-title"><?php _e('Programok', 'gyereksziget'); ?></h2>
                </div>
            </div>
            <?php foreach ($dates as $i => $date) : ?>
                <?php $date_slug = $date->slug; ?>
                <?php
                $args = array(
                    'post_type' => 'programs-cpt',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'title',
                    'tax_query' => array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'programs-category-dates',
                            'field' => 'slug',
                            'terms' => array($date_slug),
                            'operator' => 'IN',
                        ),
                        array(
                            'taxonomy' => 'programs-category-places',
                            'field' => 'ID',
                            'terms' => $term_id,
                        ),
                    ),
                    'meta_key'          => 'exact_time',
                    'orderby'           => 'meta_value_num',
                    'order'             => 'ASC'
                );

                $qry = new WP_Query($args);
                ?>
                <div class="row justify-content-center js-related-programs-content" data-id="<?php echo $i; ?>">
                    <?php while ($qry->have_posts()) : $qry->the_post() ?>
                        <div class="col-xxl-3 col-xl-4 col-md-6 col-12 custom-spacing">
                            <?php $id = get_the_ID(); ?>
                            <?php get_program_card($id); ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endforeach; ?>
    </div>
</section>
<?php wp_reset_postdata(); ?>
<?php endif; ?>
<?php get_footer(); ?>