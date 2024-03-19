<?php
$alignment = get_sub_field('alignment');
$first_image = get_sub_field('first_image');
$first_caption = get_sub_field('first_caption');
$second_image = get_sub_field('second_image');
$second_caption = get_sub_field('second_caption');
?>
<section class="section__gallery">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="gallery__wrapper <?= $alignment; ?>">
                    <?php if ($first_image) : ?>
                        <div class="gallery__inner">
                            <img data-fancybox src="<?= $first_image['url']; ?>" alt="<?= get_image_alt($first_image); ?>" class="ofi-cover-center-center">

                            <?php if ($first_caption) : ?>
                                <div class="gallery__caption"><?= $first_caption; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($second_image && $alignment == "columns") : ?>
                        <div class="gallery__inner">
                            <img data-fancybox src="<?= $first_image['url']; ?>" alt="<?= get_image_alt($first_image); ?>" class="ofi-cover-center-center">

                            <?php if ($second_caption) : ?>
                                <div class="gallery__caption"><?= $second_caption; ?></div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.fancyBox();'); ?>