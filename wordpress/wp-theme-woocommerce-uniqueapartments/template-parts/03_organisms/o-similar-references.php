<?php
$args = array(
    'post_type'      => 'references-cpt',
    'post_status'    => 'publish',
    'post__not_in'   => [$id],
    'posts_per_page' => 3,
    'orderby'        => 'rand',
);

$results = new WP_Query($args);
?>

<?php if ($results->have_posts()) : ?>
    <section>
        <div class="container-fluid">
            <div class="row mb-32">
                <div class="offset-xl-2 col-xl-4">
                    <h3 class="responsive-40"><?php _e('Similar projects', 'ua'); ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-10 col-12">
                    <div class="row js-references-slider references-slider">
                        <?php while ($results->have_posts()) : ?>
                            <?php $results->the_post(); ?>
                            <?php $id = get_the_ID(); ?>
                            <div class="col-xxl-4 col-md-6 col-12">
                                <?php get_references_card($id); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>