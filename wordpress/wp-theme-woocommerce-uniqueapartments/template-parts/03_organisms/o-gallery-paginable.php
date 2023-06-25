<?php $slider_class = $id ? 'js-gallery-paginable-'.$id : 'js-gallery-paginable'; ?>
<div class="gallery-paginable">
    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-outlined.svg" class="js-gallery-paginable-prev gallery-paginable-arrow-prev">

    <div class="<?php echo $slider_class; ?>">
        <?php foreach ($gallery as $image) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="gallery-image">
        <?php endforeach; ?>
    </div>

    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-outlined.svg" class="js-gallery-paginable-next  gallery-paginable-arrow-next">
</div>