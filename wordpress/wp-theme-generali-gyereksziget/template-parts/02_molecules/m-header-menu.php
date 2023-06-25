<?php
//Header menu
wp_nav_menu(
    array(
        'theme_location' => 'header_menu',
        'menu_class' => 'header-menu',
        'fallback_cb' => 'bs4navwalker::fallback',
        'walker' => new bs4navwalker()
    )
);
