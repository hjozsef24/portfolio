<?php
//Footer menu
wp_nav_menu(
    array(
        'theme_location' => 'footer_menu',
        'menu_class' => 'footer-menu',
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4navwalker()
    )
);
