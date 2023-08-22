<?php $technical_description = get_field('technical_description'); ?>
<?php $energy_efficience_class_badge = get_field('energy_efficience_class_badge'); ?>
<?php $download_file_button_text = get_field('download_file_button_text'); ?>
<?php $file_to_download = get_field('file_to_download'); ?>

<section class="section__technical-description">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 col-12">
                <div class="technical_description__wrapper">
                    <?php if ($technical_description) : ?>
                        <?php echo $technical_description; ?>
                    <?php endif; ?>

                    <?php if ($energy_efficience_class_badge) : ?>
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-energy-efficience.svg" alt="" class="energy-efficience d-xl-none d-block">
                    <?php endif; ?>
                </div>

                <?php if ($file_to_download) : ?>
                    <a href="<?php echo $file_to_download; ?>" download class="technical_description__download-pdf">
                        <?php echo $download_file_button_text; ?>
                    </a>
                <?php endif; ?>
            </div>

            <div class="offset-1 col-4 d-xl-block d-none">
                <?php if ($energy_efficience_class_badge) : ?>
                    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-energy-efficience.svg" alt="" class="energy-efficience">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>