<?php $body_classes = get_body_class(); ?>

<?php if ($header_logo && (in_array('home', $body_classes)
    || in_array('page-template-default', $body_classes)
    || in_array('page-template-template-benefits', $body_classes))) : ?>
    <a href="<?php echo HOME_URL; ?>" class="header__logo">
        <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo get_image_alt($header_logo); ?>" class="js-header-logo header__logo ofi-contain-center-center">
    </a>
<?php elseif ($header_logo_scrolled) : ?>
    <a href="<?php echo HOME_URL; ?>" class="header__logo">
        <img src="<?php echo $header_logo_scrolled['url']; ?>" alt="<?php echo get_image_alt($header_logo_scrolled); ?>" class="header__logo ofi-contain-center-center">
    </a>
<?php endif; ?>