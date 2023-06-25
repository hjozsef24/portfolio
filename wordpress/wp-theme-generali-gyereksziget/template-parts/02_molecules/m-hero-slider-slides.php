<section class="hero-slider">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="hero-slider js-hero-slider">
                    <?php foreach ($slides as $slide) : ?>
                        <?php $image = $slide['image']; ?>
                        <?php $text = $slide['text']; ?>
                        <?php $is_free = $slide['is_free']; ?>

                        <div>
                            <img class="hero-slider--image" src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
                            <div class="hero-slider--image-overlay"></div>
                            <?php if ($is_free) : ?>
                                <img src="<?php echo ASSETS_URI_IMG; ?>/decor/free-badge.svg" alt="Free" class="is-free-badge">
                            <?php endif; ?>
                            <div class="hero-slider--text">
                                <?php echo $text; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero-slider--extra-text">
    <div class="container-fluid">
        <?php if (!$is_hero_slider_text_section_hidden && $hero_slider_text_section) : ?>
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-md-6">
                    <div class="hero-slider--extra-text__wrapper">
                        <?php echo $hero_slider_text_section; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>