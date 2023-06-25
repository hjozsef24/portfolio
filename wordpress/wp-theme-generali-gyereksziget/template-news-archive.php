<?php /* Template name: Sablon: Hírek gyűjtő oldal */ ?>
<?php get_header(); ?>

<?php get_flexible_content(); ?>

<?php $highlighted_post = get_field('highlighted_post'); ?>

<section class="news">
    <div class="container-fluid">
        <?php if ($highlighted_post) : ?>
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-12 d-none d-md-block">
                    <?php set_query_var('highlighted_post', $highlighted_post); ?>
                    <?php get_template_part("template-parts/03_organisms/o-card-news-highlighted-card"); ?>
                </div>
            </div>
        <?php endif; ?>


        <?php
        $args = array(
            'post_type' => 'news-cpt',
            'post_status' => 'publish',
            'posts_per_page' => 9,
            'order' => 'ASC',
            'orderby' => 'title',
        );

        $qry = new WP_Query($args);
        ?>

        <?php if ($qry->have_posts()) : ?>
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-12">
                    <div class="row js-load-more-news-container">
                        <?php while ($qry->have_posts()) : $qry->the_post() ?>
                            <?php $id = get_the_ID(); ?>
                            <div class="col-xxl-4 col-md-6 col-12 custom-container-spacing">
                                <?php get_news_card($id); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-12">
                <a class="btn btn--centered js-load-more-news" href="#"><?php _e('További hírek betöltése', 'gyereksziget'); ?></a>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>