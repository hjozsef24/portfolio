<?php
$logo = $args['logo'];
$title = $args['title'];
$permalink = $args['permalink'];
?>

<div class="card__shop">
    <?php if ($permalink) : ?>
        <a href="<?= $permalink; ?>" class="card__shop__permalink"></a>
    <?php endif; ?>

    <?php if ($logo) : ?>
        <div class="card__shop__logo">
            <img src="<?= $logo['url']; ?>" alt="<?= get_image_alt($logo); ?>">
        </div>
    <?php endif; ?>

    <?php if ($title) : ?>
        <h5><?= $title; ?></h5>
    <?php endif; ?>
</div>