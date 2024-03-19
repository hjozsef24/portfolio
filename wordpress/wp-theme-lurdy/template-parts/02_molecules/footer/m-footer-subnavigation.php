<div class="footer__subnavigation">
    <div class="copyright">
        <p>© <?= date('Y') ?> Lurdy Ház</p>
    </div>

    <ul class="footer__navigation__submenu">
        <?php
        wp_nav_menu(
            array(
                'menu'           => 'footer_subnav',
                'theme_location' => 'footer_subnav',
                'container'      => '',
                'menu_class'     => '',
                'items_wrap'     => '%3$s',
                'depth'          => 2,
                'walker'         => new bs4Navwalker(),
            )
        );
        ?>
    </ul>
</div>