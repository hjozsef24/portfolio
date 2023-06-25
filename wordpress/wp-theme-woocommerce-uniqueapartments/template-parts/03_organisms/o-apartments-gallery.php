<section class="apartments__gallery">
    <div class="container-fluid custom-mobile-spacing">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="row js-apartments-gallery-slider apartments-gallery-slider">
                    <?php foreach ($gallery as $i => $id) : ?>
                        <?php $src = wp_get_attachment_image_src($id, 'full')[0]; ?>
                        <?php $default_alt = get_post_meta($id, '_wp_attachment_image_alt', TRUE); ?>
                        <?php $title = get_the_title($id); ?>
                        <?php $alt = $default_alt != "" ? $default_alt : $title; ?>

                        <div class="<?php echo ($i + 1) % 3 === 0 ? "col-12" : "col-md-6 col-12 custom-tablet-spacing"; ?>">
                            <img src="<?php echo $src; ?>" alt="<?php $alt; ?>">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>