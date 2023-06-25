<div class="progress--card">
    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
    <p class="title"><?php echo $text; ?></p>

    <?php $text = $images_and_texts[$key]['text']; ?>
    <?php $button = $images_and_texts[$key]['button']; ?>

    <div class="d-md-none d-block">
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