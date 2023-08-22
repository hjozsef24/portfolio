<?php $slider_title = get_sub_field('panorama_slider_title'); ?>
<?php $gallery = get_sub_field('panorama_slider_images'); ?>
<?php $button = get_sub_field('panorama_slider_button'); ?>


<section class="section__panorama-slider">
    <div class="container-fluid px-0">
        <?php if ($slider_title) : ?>
            <div class="row">
                <div class="col-12">
                    <h1 class="panorama-slider__title"><?php echo $slider_title; ?></h1>
                </div>
            </div>
        <?php endif; ?>


        <?php if ($gallery) : ?>
            <div class="row">
                <div class="col-12">
                    <div class="panorama-slider js-panorama-slider">
                        <?php foreach ($gallery as $image) : ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="ofi-cover-center-center cursor-pointer">
                        <?php endforeach; ?>
                    </div>
                    <!-- <div class="panorama-slider__naviagtion">
                        <button type="button" class="btn btn--arrow btn--lighter-blue js-panorama-slider-prev panorama-slider-prev"><img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt=""></button>
                        <div class="js-panorama-slider-dots"></div>
                        <button type="button" class="btn btn--arrow btn--lighter-blue js-panorama-slider-next panorama-slider-next"><img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt=""></button>
                    </div> -->
                </div>
            </div>
        <?php endif; ?>

        <?php if ($button) : ?>
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo $button['url']; ?>" class="btn--choose-style">
                        <?php echo $button['title']; ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php set_query_var('gallery', $gallery); ?>
<?php get_template_part('template-parts/03_organisms/o-gallery-modal'); ?>