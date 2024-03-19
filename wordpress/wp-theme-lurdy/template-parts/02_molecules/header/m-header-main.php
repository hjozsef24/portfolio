<?php
$header_logo = $args['header_logo'];
$language_switcher_is_hidden = $args['language_switcher_is_hidden'];
$opening_hours_is_hidden = $args['opening_hours_is_hidden'];
$opening_hours = $args['opening_hours'];
$highlighted_button = $args['highlighted_button'];
?>

<div class="header__main">
    <div class="header__language-hours d-xl-flex d-none">
        <?php if (!$language_switcher_is_hidden) : ?>
            <?= get_language_selector(); ?>
        <?php endif; ?>

        <?php if (!$opening_hours_is_hidden && $opening_hours) : ?>
            <div class="header__opening-hours">
                <img src="<?= asset('icons/clock.svg'); ?>" alt="Icon">
                <p><?= __('Nyitva', 'lurdy'); ?>:<span><?= $opening_hours; ?></span></p>
            </div>
        <?php endif; ?>
    </div>

    <?php if ($header_logo) : ?>
        <a href="<?= HOME_URL; ?>" class="header__logo ofi-contain-center-center">
            <img src="<?= $header_logo['url']; ?>" alt="<?= get_image_alt($header_logo); ?>">
        </a>
    <?php endif; ?>

    <?php if ($highlighted_button) : ?>
        <div class="header__highlighted-button d-xl-flex d-none">
            <a href="<?= $highlighted_button['url']; ?>" class="btn btn--primary"><?= $highlighted_button['title']; ?></a>
        </div>
    <?php endif; ?>

    <?php get_template_part('template-parts/01_atoms/a-header-hamburger'); ?>
</div>