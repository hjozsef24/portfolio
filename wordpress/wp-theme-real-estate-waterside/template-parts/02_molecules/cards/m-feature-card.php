<?php $icon = $feature['icon']; ?>
<?php $title = $feature['title']; ?>
<?php $text = $feature['text']; ?>
<?php $is_premium = $feature['is_premium']; ?>

<div class="feature-card js-feature-card <?php echo !$is_premium ? "is-basic" : ""; ?>">
    <?php if ($icon) : ?>
        <img src="<?php echo $icon['url']; ?>" alt="<?php echo get_image_alt($icon); ?>" class="feature-card__image">
    <?php endif; ?>

    <?php if ($title) : ?>
        <p class="feature-card__title"><?php echo $title; ?></p>
    <?php endif; ?>

    <?php if ($text) : ?>
        <p class="feature-card__text"><?php echo $text; ?></p>
    <?php endif; ?>
</div>