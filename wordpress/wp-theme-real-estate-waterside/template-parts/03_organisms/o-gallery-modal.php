<section class="section__gallery-modal js-slider-modal">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="panorama-slider-modal__wrapper">
                    <div class="js-panorama-slider-modal panorama-slider-modal">
                        <?php foreach ($gallery as $image) : ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="ofi-cover-center-center slider-image">
                        <?php endforeach; ?>
                    </div>

                    <button type="button" class="btn btn--arrow js-panorama-slider-modal-prev panorama-slider-modal-prev">
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-blue.svg" alt="">
                    </button>

                    <button type="button" class="btn btn--arrow js-panorama-slider-modal-next panorama-slider-modal-next">
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-blue.svg" alt="">
                    </button>

                    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-x-blue.svg" alt="" class="js-close-panorama-slider-modal close-panorama-slider-modal">

                </div>
            </div>
        </div>
    </div>
</section>