<section class="image-and-text bg-black-blue <?php echo $custom_padding ? "pad-150-190" : "pad-175-100"; ?>">
    <div class="container">
        <div class="row h-100">
            <?php if ($text) : ?>
                <div class="col-xl-6 col-12 image-and-text--text__wrapper" data-aos="fade-right" data-aos-duration="1000" data-aos-once="true">
                    <?php echo $text; ?>
                </div>
            <?php endif; ?>

            <div class="col-xl-6 col-12 image-and-text--image__wrapper" data-aos="fade-left" data-aos-duration="1000" data-aos-once="true">
                <?php if ($image) : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>