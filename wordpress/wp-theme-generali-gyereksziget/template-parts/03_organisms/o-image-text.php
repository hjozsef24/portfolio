<?php $is_image_aligned_right = get_sub_field('image_text_image_to_right'); ?>
<?php $image_text_image = get_sub_field('image_text_image'); ?>
<?php $image_text_text = get_sub_field('image_text_text'); ?>

<section class="image-text">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-10 col-12">
                <div class="image-text__wrapper">
                    <div class="image__wrapper <?php echo $is_image_aligned_right ? 'order-2' : 'order-1'; ?>">
                        <img src="<?php echo $image_text_image['url']; ?>" alt="<?php echo get_image_alt($image_text_image); ?>">
                    </div>
                    <div class="text__wrapper <?php echo $is_image_aligned_right ? 'order-1' : 'order-2'; ?>">
                        <?php echo $image_text_text; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>