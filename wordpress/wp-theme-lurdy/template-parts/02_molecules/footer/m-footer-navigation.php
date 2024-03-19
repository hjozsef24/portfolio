<?php if (has_nav_menu('footer_nav')) : ?>
    <ul class="footer__navigation__menu">
        <?php
        wp_nav_menu(
            array(
                'menu'           => 'footer_nav',
                'theme_location' => 'footer_nav',
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