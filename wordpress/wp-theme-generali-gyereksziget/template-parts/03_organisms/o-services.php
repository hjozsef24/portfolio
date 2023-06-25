<?php
$args = array(
    'post_type' => 'services-cpt',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'order' => 'ASC',
    'orderby' => 'title',
);

$qry = new WP_Query($args);
?>

<?php if ($qry->have_posts()) : ?>
    <section class="service">
        <div class="container-fluid">
            <div class="row">
                <?php while ($qry->have_posts()) : $qry->the_post() ?>
                    <?php $id = get_the_ID(); ?>
                    <?php $title = get_the_title(); ?>
                    <?php $excerpt = get_field('excerpt', $id); ?>
                    <?php $image = get_field('image', $id); ?>
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                        <?php set_query_var('title', $title) ?>
                        <?php set_query_var('excerpt', $excerpt) ?>
                        <?php set_query_var('image', $image) ?>
                        <?php get_template_part('template-parts/03_organisms/o-card-services-card') ?>
                    </div>

                <?php endwhile; ?>
            </div>
           
        </div>
    </section>
<?php endif; ?>
<?php wp_reset_query(); ?>