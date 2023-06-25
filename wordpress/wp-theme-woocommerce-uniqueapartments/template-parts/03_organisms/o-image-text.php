<section class="image-text">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-6 p-0 <?php echo ($key + 1) % 2 == 0 ? 'order-2' : 'order-1'; ?>">
                <?php if ($image) : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
                <?php endif; ?>
            </div>
            <div class="col-6 my-auto <?php echo ($key + 1) % 2 == 0 ? 'order-1' : 'order-2'; ?>">
                <div class="image-text--text__wrapper">
                    <?php if ($text) : ?>
                        <?php echo $text; ?>
                    <?php endif; ?>

                    <?php if ($button) : ?>
                        <a href="<?php echo $button['url']; ?>" target="" class="btn btn--primary">
                            <?php echo $button['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>