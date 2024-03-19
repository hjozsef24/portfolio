<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="manifest" href="<?= FAVICON_DIR; ?>/site.webmanifest">
    <link rel="mask-icon" href="<?= FAVICON_DIR; ?>/safari-pinned-tab.svg" color="#011d3c">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= FAVICON_DIR; ?>/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= FAVICON_DIR; ?>/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= FAVICON_DIR; ?>/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="194x194" href="<?= FAVICON_DIR; ?>/favicon-194x194.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?= FAVICON_DIR; ?>/android-chrome-192x192.png">
    
    <meta name="theme-color" content="#0C2C3C">
    <meta name="msapplication-TileColor" content="#0C2C3C">
    <meta name="msapplication-TileImage" content="<?= FAVICON_DIR; ?>/mstile-144x144.png">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

    <?php get_template_part('template-parts/03_organisms/o-header'); ?>