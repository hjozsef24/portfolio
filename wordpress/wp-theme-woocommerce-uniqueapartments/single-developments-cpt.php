<?php get_header(); ?>

<?php $thumbnail = get_field('thumbnail'); ?>
<?php $title = get_the_title(); ?>
<?php $gallery = get_field('gallery'); ?>
<?php $attributes = get_field('attributes'); ?>
<?php $features = get_field('features'); ?>
<?php $location = get_field('location'); ?>
<?php $related_apartments = get_field('apartments'); ?>
<?php $related_apartments_button = get_field('related_apartments_button'); ?>

<section class="single--developments">
    <div class="container-fluid px-0">
        <div class="row justify-content-center">
            <?php if ($thumbnail) : ?>
                <div class="col-12">
                    <img class="hero-image" src="<?php echo $thumbnail['url']; ?>" alt="<?php echo get_image_alt($thumbnail); ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <h2 class="title responsive-40"><?php echo $title; ?></h2>

                <?php if ($attributes) : ?>
                    <?php set_query_var('attributes', $attributes); ?>
                    <?php get_template_part('template-parts/03_organisms/o-attributes-with-icons'); ?>
                <?php endif; ?>

                <?php if ($gallery) : ?>
                    <?php set_query_var('gallery', $gallery); ?>
                    <?php set_query_var('post_id', false); ?>
                    <?php get_template_part('template-parts/03_organisms/o-gallery-paginable'); ?>
                <?php endif; ?>

                <?php if ($features) : ?>
                    <div class="features">
                        <?php foreach ($features as $feature) : ?>
                            <?php $feature_title = $feature['features_title']; ?>
                            <?php $features_text = $feature['features']; ?>

                            <?php if ($title) : ?>
                                <h3 class="features--title responsive-32"><?php echo $title; ?></h3>
                            <?php endif; ?>

                            <?php if ($features_text) : ?>
                                <div class="features--text">
                                    <?php echo $features_text; ?>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php if ($location) : ?>
                    <?php set_query_var('location', $location); ?>
                    <?php get_template_part('template-parts/03_organisms/o-map'); ?>
                <?php endif; ?>

                <?php if ($related_apartments) : ?>
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <h3 class="apartments-title responsive-40"><?php _e('Apartments', 'ua'); ?></h3>
                        </div>
                    </div>

                    <div class="row justify-content-center js-related-apartments-slider related-apartments-slider">
                        <?php foreach ($related_apartments as $i => $id) : ?>
                            <?php $last_item = array_key_last($related_apartments); ?>
                            <div class="col-xl-4 col-6 <?php echo $last_item == $i ? 'hidden-tablet' : ''; ?>">
                                <?php get_product_card($id, $gallery = false, $location = false); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if ($related_apartments_button) : ?>
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <a href="<?php echo $related_apartments_button['url']; ?>" class="btn btn--primary btn--centered">
                                    <?php echo $related_apartments_button['title']; ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>