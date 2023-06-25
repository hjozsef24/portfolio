<div class="row">
    <div class="col-12">
        <div class="gallery--aligned-right">
            <?php foreach ($gallery_images as $image) : ?>
                <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="gallery-image">
            <?php endforeach; ?>

            <img src="<?php echo $main_image['url']; ?>" alt="<?php echo get_image_alt($main_image); ?>" class="main-image">
        </div>
    </div>
</div>