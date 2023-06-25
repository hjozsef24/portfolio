<?php
wp_nav_menu(array(
    'theme_location' => 'header_menu',
    'menu_class' => 'header-menu header-menu--desktop',
    'fallback_cb' => 'bs4navwalker::fallback',
    'walker' => new bs4navwalker()
));

