<?php if ($footer_main_copyright_text) : ?>
    <div class="footer__main-copyright"><?php echo $footer_main_copyright_text; ?></div>
<?php endif; ?>

<?php
wp_nav_menu(array(
    'theme_location' => 'footer_menu',
    'menu_class' => 'footer__menu',
    'fallback_cb' => 'bs4navwalker::fallback',
    'walker' => new bs4FooterNavwalker()
));
?>

<?php if ($footer_secondary_copyright_text) : ?>
    <p  class="footer__secondary-copyright"><?php echo $footer_secondary_copyright_text; ?></p>
<?php endif; ?>