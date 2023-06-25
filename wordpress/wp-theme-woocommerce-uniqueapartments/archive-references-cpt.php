<?php get_header(); ?>

<?php $archive_references_text = get_field('references_archive_page_main_text', 'options'); ?>
<?php
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'references-cpt',
    'post_status' => 'publish',
    'posts_per_page' => 6,
    'order' => 'DESC',
    'orderby' => 'date',
    'paged' => $paged
);
$qry = new WP_Query($args);
?>

<?php if ($archive_references_text) : ?>
    <?php set_query_var('text', $archive_references_text); ?>
    <?php get_template_part('template-parts/03_organisms/o-text'); ?>
<?php endif; ?>

<?php if ($qry->have_posts()) : ?>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-12">
                    <div class="row">
                        <?php while ($qry->have_posts()) : $qry->the_post() ?>
                            <div class="col-xl-4 col-md-6 col-12">
                                <?php $id = get_the_ID(); ?>
                                <?php get_references_card($id); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-10 col-12">
                    <?php set_query_var('qry', $qry); ?>
                    <?php get_template_part('template-parts/03_organisms/o-pagination'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>