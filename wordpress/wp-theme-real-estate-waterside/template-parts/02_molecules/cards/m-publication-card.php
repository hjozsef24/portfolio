<div class="publication-card">
    <?php if ($main_image) : ?>
        <div class="publication-card__header">
            <a href="<?php echo $permalink; ?>">
                <img src="<?php echo $main_image['url']; ?>" alt="<?php echo get_image_alt($main_image); ?>" class="publication-card__image">
            </a>

            <?php if ($post_categories) : ?>
                <div class="publication-card__badge__wrapper">
                    <?php foreach ($post_categories as $pc) : ?>
                        <?php $category_link = get_term_link($pc, 'publications-cpt'); ?>
                        <a href="<?php echo $category_link; ?>" class="publication-card__badge">
                            <?php echo $pc->name; ?>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="publication-card__body">
        <div class="publication-card__informations">
            <p><?php echo $date; ?></p>
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/decor-dot.svg" alt="">
            <p><?php echo $estimated_reading_time; ?></p>
        </div>

        <a href="<?php echo $permalink; ?>">
            <p class="publication-card__title"><?php echo $title; ?></p>
        </a>
        
        <p class="publication-card__excerpt"><?php echo $excerpt; ?></p>
    </div>
</div>