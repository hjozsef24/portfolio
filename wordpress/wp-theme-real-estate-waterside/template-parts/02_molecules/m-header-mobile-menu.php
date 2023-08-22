<?php $languages = language_selector(); ?>

<div class="header--mobile--menu js-mobile-menu">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'menu_class' => 'header__menu',
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4HeaderNavwalker()
    ));
    ?>

    <div>
        <?php if (!$is_language_switcher_hidden && $languages != '') : ?>
            <?php echo $languages; ?>
        <?php endif; ?>

        <?php if ($header_phone_number) : ?>
            <?php $header_phone_number_numeric = preg_replace('/\D+/', '', $header_phone_number); ?>

            <a href="tel:<?php echo $header_phone_number_numeric; ?>" class="header__phone-number animated-text" data-text-hover="<?php echo $header_phone_number; ?>">
                <span><?php echo $header_phone_number; ?></span>
            </a>
        <?php endif; ?>
    </div>
</div>