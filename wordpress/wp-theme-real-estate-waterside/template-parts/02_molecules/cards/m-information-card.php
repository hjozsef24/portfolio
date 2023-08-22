<?php $icon = $ic['icon']; ?>
<?php $title = $ic['title']; ?>
<?php $text = $ic['text']; ?>
<?php $button = $ic['button']; ?>

<div class="information-card">
    <div class="information-card__main-content js-information-card">
        <?php if ($icon) : ?>
            <img src="<?php echo $icon['url']; ?>" alt="<?php echo get_image_alt($icon); ?>" class="information-card__icon ofi-contain-center-center">
        <?php endif; ?>

        <?php if ($title) : ?>
            <h5 class="information-card__title"><?php echo $title; ?></h5>
        <?php endif; ?>


    </div>

    <?php if ($text || $button) : ?>
        <div class="information-card__hover-content js-information-card-hover-content" >
            <?php if ($text) : ?>
                <p class="information-card__hover-content__text">
                    <?php echo $text; ?>
                </p>
            <?php endif; ?>

            <?php if ($button) : ?>
                <?php echo get_button($button, 'secondary'); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>