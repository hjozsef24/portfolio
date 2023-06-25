<div class="single-program-info-card">
    <?php if ($image) : ?>
        <img class="thumbnail-image" src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
    <?php endif; ?>

    <div class="text__wrapper <?php echo !$image ? "all-borders-rounded" : ""; ?>">
        <div class="additional-info__wrapper">
            <div class="badge">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/pin.svg" alt="">
                <p><?php echo $place; ?></p>
            </div>

            <div class="badge">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/calendar.svg" alt="">
                <p><?php echo $program_times; ?></p>
            </div>

            <?php if (!$is_free && $price) : ?>
                <div class="badge">
                    <img src="<?php echo ASSETS_URI_IMG; ?>/decor/free-pig.svg" alt="">
                    <p><?php echo $price; ?></p>
                </div>
            <?php endif; ?>
        </div>

        <div class="description__wrapper">
            <?php echo $description; ?>
        </div>
    </div>
</div>