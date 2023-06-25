<?php get_header(); ?>

<?php $archive_developments_text = get_field('developments_archive_page_main_text', 'options'); ?>
<?php $args = create_development_filter_query_args($term_id); ?>
<?php $qry = new WP_Query($args); ?>
<?php $counted_results = $qry->found_posts; ?>

<?php if ($archive_developments_text) : ?>
    <?php set_query_var('text', $archive_developments_text); ?>
    <?php get_template_part('template-parts/03_organisms/o-text'); ?>
<?php endif; ?>

<?php set_query_var('counted_results', $counted_results); ?>
<?php get_template_part('template-parts/03_organisms/o-filter-developments'); ?>

<?php if ($qry->have_posts()) : ?>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-12">
                    <div class="row">
                        <?php while ($qry->have_posts()) : $qry->the_post() ?>
                            <div class="col-xl-4 col-md-6 col-12">
                                <?php $id = get_the_ID(); ?>
                                <?php get_developments_card($id); ?>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_query(); ?>
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