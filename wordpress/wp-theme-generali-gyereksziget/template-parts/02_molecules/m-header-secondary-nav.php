<div class="header--secondary-nav">
    <?php $template_map_url = get_template_link('template-map.php'); ?>
    <?php $template_account_url = get_template_link('template-account.php'); ?>

    <?php if (!$is_header_map_hidden && $template_map_url) : ?>
        <a href="<?php echo $template_map_url; ?>" class="nav-icon__wrapper">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/header-map-icon.svg" alt="">
        </a>
    <?php endif; ?>

    <?php if (!$is_header_profile_hidden && $template_account_url) : ?>
        <a href="<?php echo $template_account_url; ?>" class="nav-icon__wrapper">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/header-user-icon.svg" alt="">
        </a>
    <?php endif; ?>

    <?php /* Language selector */ ?>
    <?php // echo $languages; ?>

    <?php if ($generali_logo) : ?>
        <div class="generali__wrapper">
            <img class="generali-logo" src="<?php echo $generali_logo['url']; ?>" alt="<?php echo get_image_alt($generali_logo); ?>">
        </div>
    <?php endif; ?>

</div>