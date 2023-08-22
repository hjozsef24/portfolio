<?php $simple_slider_title = get_sub_field('simple_slider_title'); ?>
<?php $simple_slider_images = get_sub_field('simple_slider_images'); ?>

<section class="section__simple-slider">
    <?php if ($simple_slider_title) : ?>
        <div class="container-fluid simple-slider__header">
            <div class="row">
                <div class="offset-xl-1 col-xl-10 col-12">
                    <h4 class="simple-slider__title"><?php echo $simple_slider_title; ?></h4>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($simple_slider_images) : ?>
        <div class="container-fluid px-0 simple-slider__container">
            <div class="row">
                <div class="col-12">
                    <div class="simple-slider js-simple-slider">
                        <?php foreach ($simple_slider_images as $image) : ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="simple-slider__image ofi-cover-center-center">
                        <?php endforeach; ?>
                    </div>

                    <div class="simple-slider__naviagtion">
                        <button type="button" class="btn btn--arrow btn--lighter-blue js-simple-slider-prev simple-slider-prev"><img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt=""></button>
                        <div class="js-simple-slider-dots"></div>
                        <button type="button" class="btn btn--arrow btn--lighter-blue js-simple-slider-next simple-slider-next"><img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt=""></button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>