<?php foreach ($tabs_repeater as $i => $repeater) : ?>
    <?php $tabs_content = $repeater['tabs_content']; ?>
    <div class="row justify-content-center js-tab-content" data-id="<?php echo $i; ?>">

        <?php foreach ($tabs_content as $content) : ?>
            <?php $text = $content['text']; ?>
            <?php $image = $content['image']; ?>
            <?php $image_title = $content['image_title']; ?>
            <?php $is_image_aligned_right = $content['image_aligned_right']; ?>

            <div class="col-xxl-4 col-12 <?php echo $is_image_aligned_right ? 'order-lg-2 order-1' : 'order-1'; ?>">
                <?php if ($image_title) : ?>
                    <p class="tab--image-title"><?php echo $image_title; ?></p>
                <?php endif; ?>

                <?php if ($image) : ?>
                    <img class="tab--image" src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
                <?php endif; ?>
            </div>

            <div class="col-xxl-4 col-12 <?php echo $is_image_aligned_right ? 'order-1' : 'order-2'; ?>">
                <div class="tab--text">
                    <?php if ($text) : ?>
                        <?php echo $text; ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endforeach; ?>