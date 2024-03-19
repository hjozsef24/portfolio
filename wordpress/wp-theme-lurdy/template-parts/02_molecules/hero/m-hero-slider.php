<?php $heros = $args['heros']; ?>

<div class="js-hero-slider">
    <?php foreach ($heros as $h) : ?>
        <?php $hero_type = $h['hero_type']; ?>
        <?php $background_image = $h['background_image']; ?>
        <?php $background_video = $h['background_video']; ?>
        <?php $image_aligned = $h['image_aligned']; ?>
        <?php $title = $h['title']; ?>
        <?php $button = $h['button']; ?>
        <?php $button_type = $h['button_type']; ?>
        <?php $overlay_is_hidden = $h['overlay_is_hidden']; ?>

        <?php $extra_class = $overlay_is_hidden ? ' overlay-is-hidden ' : ''; ?>

        <div class="hero-slide <?= $extra_class; ?>">

            <?php if ($hero_type == 'image' && $background_image) : ?>
                <img src="<?= $background_image['url']; ?>" alt="<?= get_image_alt($background_image); ?>" class="ofi-cover-<?= $image_aligned; ?>-center hero__image">
            <?php endif; ?>

            <?php if ($hero_type == 'video' && $background_video) : ?>
                <video autoplay muted loop class="hero__video">
                    <source src="<?= $background_video; ?>" type="video/<?= pathinfo($background_video, PATHINFO_EXTENSION); ?>">
                </video>
            <?php endif; ?>

            <div class="hero-slide__content">
                <?php if ($title) : ?>
                    <h1><?= $title; ?></h1>
                <?php endif; ?>

                <?php if ($button) : ?>
                    <a href="<?= $button['url']; ?>" class="btn btn--<?= $button_type ?>"><?= $button['title']; ?></a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>