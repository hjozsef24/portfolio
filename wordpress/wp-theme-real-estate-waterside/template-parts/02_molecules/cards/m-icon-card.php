<?php $icon = $card['icon']; ?>
<?php $text = $card['text']; ?>

<div class="icon-card__wrapper js-icon-card">
    <?php if ($icon) : ?>
        <img src="<?php echo $icon['url']; ?>" alt="<?php echo get_image_alt($icon); ?>" class="ofi-contain-center-center">
    <?php endif; ?>

    <?php if ($text) : ?>
        <p><?php echo $text; ?></p>
    <?php endif; ?>
</div>