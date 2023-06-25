<?php /* Template name: Sablon: Programok gyűjtő oldal */ ?>
<?php get_header(); ?>

<?php get_flexible_content(); ?>

<?php // FILTER SECTION START 
?>
<?php $types = get_terms('programs-category-types', array('hide_empty' => true)); ?>
<?php $ages = get_terms('programs-category-ages', array('hide_empty' => true)); ?>
<?php $dates = get_terms('programs-category-dates', array('hide_empty' => true)); ?>

<?php $programs_cta = get_field('programs_cta'); ?>

<section class="programs">
    <div class="container-fluid custom-container-spacing">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php set_query_var('ages', $ages); ?>
                <?php set_query_var('dates', $dates); ?>
                <?php set_query_var('types', $types); ?>
                <?php get_template_part('template-parts/03_organisms/o-program-filter'); ?>
            </div>
        </div>
        <div class="row">
            <?php if ($dates) : ?>
                <?php
                $args = array(
                    'post_type' => 'programs-cpt',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                    'orderby' => 'title',
                );

                $qry = new WP_Query($args);
                ?>
                <?php if ($qry->have_posts()) : ?>
                    <?php $i = 0; ?>
                    <?php while ($qry->have_posts()) : $qry->the_post() ?>
                        <?php $id = get_the_ID(); ?>
                        <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                            <?php get_program_card($id); ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>