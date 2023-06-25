<?php get_header(); ?>

<?php $id = get_the_ID(); ?>
<?php $title = get_the_title(); ?>
<?php $price = get_field('price'); ?>
<?php $galleries = get_field('galleries'); ?>
<?php $mobile_hero = $galleries[0]['main_image']; ?>
<?php $attributes = get_field('attributes'); ?>
<?php $description = get_field('description'); ?>
<?php $project_term_id = get_field('project'); ?>
<?php $project = get_term($project_term_id)->name; ?>


<section class="single--home-for-sale">
    <div class="container-fluid d-md-none d-block px-0">
        <div class="row">
            <div class="col-12">
                <img src="<?php echo $mobile_hero['url']; ?>" alt="<?php echo get_image_alt($mobile_hero); ?>" class="mobile-hero">
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-5 col-xl-6 col-12">
                <h2 class="responsive-32"><?php echo $title; ?></h2>

                <?php if ($attributes) : ?>
                    <?php set_query_var('attributes', $attributes); ?>
                    <?php get_template_part('template-parts/03_organisms/o-attributes-with-icons'); ?>
                <?php endif; ?>

                <?php if ($description) : ?>
                    <div class="description">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-xxl-2 col-xl-4 col-12">
                <?php if ($price) : ?>
                    <div class="price">
                        <p><?php _e('Price: ', 'ua'); ?></p>
                        <h4><?php echo $price; ?></h4>
                    </div>
                <?php endif; ?>

                <?php set_query_var('id', $id); ?>
                <?php get_template_part('template-parts/03_organisms/o-add-to-wishlist'); ?>

                <?php set_query_var('id', $id); ?>
                <?php get_template_part('template-parts/03_organisms/o-button-get-in-touch'); ?>
            </div>
        </div>
    </div>
</section>

<?php if ($galleries) : ?>
    <?php set_query_var('galleries', $galleries); ?>
    <?php get_template_part('template-parts/03_organisms/o-gallery-grid'); ?>
    
    <?php $images = get_all_images_from_gallery($galleries); ?>
    <?php set_query_var('images', $images); ?>
    <?php get_template_part('template-parts/03_organisms/o-gallery-mobile-slider');?>
<?php endif; ?>

<?php get_footer(); ?>