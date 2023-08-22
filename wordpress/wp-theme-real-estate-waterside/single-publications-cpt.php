<?php get_header(); ?>

<?php $post_id = get_the_ID(); ?>
<?php $title = get_the_title(); ?>
<?php $permalink = get_permalink(); ?>
<?php $date = get_the_date('d/m/Y'); ?>
<?php $excerpt = get_field('excerpt'); ?>
<?php $content = get_field('content'); ?>
<?php $main_image = get_field('main_image'); ?>
<?php $related_publications = get_field('related_publications'); ?>
<?php $estimated_reading_time = estimated_reading_time($content); ?>
<?php $main_image_description = get_field('main_image_description'); ?>
<?php $post_categories = get_the_terms($post_id, 'publications-category'); ?>
<?php $publication_archive_url = get_post_type_archive_link('publications-cpt'); ?>
<?php $facebook_share_url = "https://www.facebook.com/sharer/sharer.php?u=" . $permalink; ?>



<main class="template template--single-publications">
    <section class="section__publication__header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-12 publication__header__wrapper">
                    <a href="<?php echo $publication_archive_url; ?>" class="btn--back-to-articles">
                        <?php _e('back to the articles', 'waterside'); ?>
                    </a>

                    <div class="publication__header__informations">
                        <?php if ($post_categories) : ?>
                            <?php foreach ($post_categories as $category) : ?>
                                <?php $category_link = get_term_link($category, 'publications-cpt'); ?>
                                <a href="<?php echo $category_link; ?>" class="badge">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="date_reading-time__wrapper">
                            <p><?php echo $date; ?></p>
                            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/decor-dot.svg" alt="">
                            <p><?php echo $estimated_reading_time; ?></p>
                        </div>
                    </div>

                    <p class="publication__header__title"><?php echo $title; ?></p>

                    <div class="publication__header__share">
                        <p><?php _e('Share', 'waterside'); ?></p>

                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-copy-url.svg" class="js-copy-url publication__header__share__icon" data-permalink="<?php echo $permalink; ?>">

                        <a href="<?php echo $facebook_share_url; ?>" target="_blank">
                            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-facebook.svg" class="publication__header__share__icon">
                        </a>
                    </div>
                </div>

                <div class="col-xl-8 col-12">
                    <?php if ($main_image) : ?>
                        <img src="<?php echo $main_image['url']; ?>" alt="<?php echo get_image_alt($main_image); ?>" class="publication__main-image ofi-cover-center-center">
                    <?php endif; ?>

                    <?php if ($main_image_description) : ?>
                        <p class="publication__main-image__description">
                            <?php echo $main_image_description ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="offset-xl-5 col-xl-6 col-12">
                    <?php if ($excerpt) : ?>
                        <p class="publication__excerpt"><?php echo $excerpt ?></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </section>

    <section class="section__publication__content">
        <div class="container-fluid">
            <div class="row">
                <div class="offset-xl-5 col-xl-6 col-12">
                    <div class="publication__content__wrapper">
                        <?php echo $content; ?>
                    </div>
                </div>
                <div class="divider"></div>
            </div>
        </div>
    </section>

    <section class="section__other-publications">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="other-publications__title responsive-font-94"><?php _e('Other publications', 'waterside'); ?></h3>
                </div>
            </div>

            <div class="row justify-content-center">
                <?php if ($related_publications) : ?>
                    <?php foreach ($related_publications as $rp) : ?>
                        <div class="col-3">
                            <?php get_publication_card($rp); ?>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <?php
                    $args = array(
                        'numberposts' => 4,
                        'post_type' => 'publications-cpt',
                        'post_status' => 'publish',
                        'exclude' => [$post_id],
                        'orderby' => 'rand'
                    );
                    ?>
                    <?php $other_publications = get_posts($args); ?>
                    <?php if ($other_publications) : ?>
                        <div class="js-other-publications-slider other-publications-slider">
                            <?php foreach ($other_publications as $op) : ?>
                                <div class="col-3">
                                    <?php get_publication_card($op); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>