<div class="header__primary-navigation">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'header_menu',
        'menu_class' => 'header__menu',
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4HeaderNavwalker()
    ));

    if ($header_live_url) {
        get_template_part('template-parts/01_atoms/a-live-button');
    }
    ?>
</div>