<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo FAVICON_DIR; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo FAVICON_DIR; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo FAVICON_DIR; ?>/favicon-16x16.png">
    <link rel="manifest" href="<?php echo FAVICON_DIR; ?>/site.webmanifest">
    <link rel="mask-icon" href="<?php echo FAVICON_DIR; ?>/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    
    <!-- <script type="module" crossorigin="" src="https://panorama-slider.uiinitiative.com/assets/index.bcc97824.js"></script>
    <link rel="stylesheet" href="https://panorama-slider.uiinitiative.com/assets/index.140234dd.css"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php tracking_code(1); ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="d-none">
        <?php tracking_code(2); ?>
    </div>

    <?php get_template_part('template-parts/03_organisms/o-header'); ?>
    <?php get_template_part('template-parts/03_organisms/o-wishlist'); ?>