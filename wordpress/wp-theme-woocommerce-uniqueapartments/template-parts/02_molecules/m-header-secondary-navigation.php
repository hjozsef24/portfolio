<div class="header--secondary-navigation">
    <?php $languages = language_selector(); ?>

    <?php if (!$is_language_switcher_hidden && $languages != '') : ?>
        <?php echo $languages; ?>
    <?php endif; ?>

    <?php if (!$is_login_menu_hidden) : ?>
        <?php get_template_part('template-parts/01_atoms/a-header-account'); ?>
    <?php endif; ?>

    <?php if (!$is_wishlist_menu_hidden) : ?>
        <?php get_template_part('template-parts/01_atoms/a-header-wishlist'); ?>
    <?php endif; ?>

    <?php if (!$is_bundle_menu_hidden) : ?>
        <?php echo woocommerce_custom_cart(); ?>
    <?php endif; ?>
</div>