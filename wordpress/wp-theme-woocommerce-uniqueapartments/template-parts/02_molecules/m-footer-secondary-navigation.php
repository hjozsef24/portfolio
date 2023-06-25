<div class="footer--submenu__wrapper">
    <?php get_template_part('template-parts/01_atoms/a-footer-copyright'); ?>
    <?php
    wp_nav_menu(array(
        'theme_location' => 'footer_submenu',
        'menu_class' => 'footer-submenu',
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4navwalker()
    ));
    ?>
</div>