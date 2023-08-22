<?php $sliders_with_texts = get_sub_field('slider_with_text'); ?>

<?php foreach ($sliders_with_texts as $i => $sliders) : ?>
    <?php $decor_image = $sliders['decor_image']; ?>
    <?php $decor_image_left = $sliders['decor_image_left']; ?>
    <?php $decor_image_bottom = $sliders['decor_image_bottom']; ?>
    <?php $slider_image_column = $i == 0 ? "col-md-6 col-12" : "col-xl-7 col-md-6 col-12"; ?>
    <?php $slider_image_column .= ($i + 1) % 2 == 0 ? ' order-md-2 ps-0' : ' order-md-1 pe-0'; ?>
    <?php $slider_text_column = $i == 0 ? "col-md-6 col-12 align-xl-center" : "col-xl-5 col-md-6 col-12 align-xl-center"; ?>
    <?php $slider_text_column .= ($i + 1) % 2 == 0 ? ' order-md-1 decor-aligned-left' : ' order-md-2'; ?>
    <?php $slider = $sliders['slider']; ?>
    <?php $slider_images = []; ?>
    <?php $slider_texts = []; ?>

    <?php
    foreach ($slider as $slide) {
        $slider_texts[] = array(
            'title' => $slide['title'],
            'text' => $slide['text']
        );
        $slider_images[] = $slide['image'];
    }
    ?>
    <section class="section__slider-text-image">

        <div class="container-fluid p-0">
            <div class="row">
                <div class="<?php echo $slider_image_column; ?>">
                    <?php if (!empty($slider_images)) : ?>
                        <div class="js-slider-text-image-images-<?php echo $i; ?> slider-text-image-images__wrapper">
                            <?php foreach ($slider_images as $image) : ?>
                                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="slider-text-image__image">
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="<?php echo $slider_text_column; ?>">

                    <div class="js-slider-text-image-texts-<?php echo $i; ?> slider-text-image-texts__wrapper">
                        <?php foreach ($slider_texts as $texts) : ?>
                            <?php $title = $texts['title']; ?>
                            <?php $text = $texts['text']; ?>

                            <div>
                                <?php if ($title) : ?>
                                    <h4 class="slider-text-image__title"><?php echo $title; ?></h4>
                                <?php endif; ?>
                                <?php if ($text) : ?>
                                    <p class="slider-text-image__text"><?php echo $text; ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <?php if (count($slider_texts) > 1) : ?>
                        <div class="text-image-slider__navigation">
                            <button type="button" class="btn btn--arrow btn--lighter-blue js-text-image-slider-prev text-image-slider-prev">
                                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt="">
                            </button>
                            <p class="text-image-slider-counter">
                                <span class="js-text-image-slider-counter">1</span>
                                /
                                <span class="js-text-image-slider-all"></span>
                            </p>
                            <button type="button" class="btn btn--arrow btn--lighter-blue js-text-image-slider-next text-image-slider-next">
                                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt="">
                            </button>
                        </div>
                    <?php endif; ?>

                    <?php if ($decor_image) : ?>
                        <img src="<?php echo $decor_image['url']; ?>" alt="<?php echo get_image_alt($decor_image); ?>" class="slider-text-image__decor ofi-contain-center-center" style="left: <?php echo $decor_image_left; ?>px;bottom: <?php echo $decor_image_bottom; ?>px">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endforeach; ?>