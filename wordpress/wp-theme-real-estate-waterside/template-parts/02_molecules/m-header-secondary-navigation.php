<?php $languages = language_selector(); ?>
<?php $body_classes = get_body_class(); ?>

<div class="header__secondary-navigation">
    <?php if (!$is_language_switcher_hidden && $languages != '') : ?>
        <?php echo $languages; ?>
    <?php endif; ?>

    <?php if (!$is_apartment_selector_hidden) : ?>
        <?php get_template_part('template-parts/01_atoms/a-apartment-selector'); ?>
    <?php endif; ?>

    <?php if ($header_phone_number) : ?>
        <?php $header_phone_number_numeric = preg_replace('/\D+/', '', $header_phone_number); ?>

        <a href="tel:<?php echo $header_phone_number_numeric; ?>" class="header__phone-number animated-text" data-text-hover="<?php echo $header_phone_number; ?>">
            <?php if (in_array('home', $body_classes) 
            || in_array('page-template-default', $body_classes)
            || in_array('page-template-template-benefits', $body_classes)) : ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-phone-white.svg" alt="">
            <?php else : ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-phone-blue.svg" alt="">
            <?php endif; ?>
            <span><?php echo $header_phone_number; ?></span>
        </a>
    <?php endif; ?>
</div>