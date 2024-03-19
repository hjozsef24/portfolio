<?php
$language_switcher_is_hidden = $args['language_switcher_is_hidden'];
$opening_hours_is_hidden = $args['opening_hours_is_hidden'];
$opening_hours = $args['opening_hours'];
$highlighted_button = $args['highlighted_button'];
?>

<div class="header__navigation js-mobile-menu">
    <?php if (has_nav_menu('header_nav')) : ?>
        <ul class="header__navigation__menu">
            <?php
            wp_nav_menu(
                array(
                    'menu'           => 'header_nav',
                    'theme_location' => 'header_nav',
                    'container'      => '',
                    'menu_class'     => '',
                    'items_wrap'     => '%3$s',
                    'depth'          => 2,
                    'walker'         => new bs4Navwalker(),
                )
            );
            ?>
        </ul>
    <?php endif; ?>

    <div class="header__navigation__responsive--decor"></div>
    
    <?php if ($highlighted_button) : ?>
        <div class="header__highlighted-button d-xl-none d-flex">
            <a href="<?= $highlighted_button['url']; ?>" class="btn btn--primary"><?= $highlighted_button['title']; ?></a>
        </div>
    <?php endif; ?>

    <?php if (!$language_switcher_is_hidden) : ?>
        <div class="header__language-selector--responsive d-xl-none d-flex">
            <?= get_language_selector(); ?>
        </div>
    <?php endif; ?>

    <?php if (!$opening_hours_is_hidden && $opening_hours) : ?>
        <div class="header__opening-hours d-xl-none d-flex">
            <img src="<?= asset('icons/clock.svg'); ?>" alt="Icon">
            <p><?= __('Nyitva', 'lurdy'); ?>:<span><?= $opening_hours; ?></span></p>
        </div>
    <?php endif; ?>
</div>