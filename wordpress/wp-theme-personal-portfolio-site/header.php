<!DOCTYPE html>
<html lang="hu">

<head>
    <?php $site_url = get_site_url(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $site_url; ?>/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $site_url; ?>/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site_url; ?>/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $site_url; ?>/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo $site_url; ?>/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php $logoHeader = get_field('logo_header', 'options'); ?>

    <section class="header js-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="header__wrapper">
                        <a href="<?php echo home_url(); ?>" class="header__logo__wrapper">
                            <?php if ($logoHeader) : ?>
                                <img class="header__logo" src="<?php echo $logoHeader['url'] ?>" alt="<?php echo get_image_alt($logoHeader) ?>">
                            <?php else : ?>
                                <span class="header__title"><?php _e('Hajdu József - Webfejlesztő - Portfolio', 'hajdujozsef'); ?></span>
                            <?php endif; ?>

                        </a>
                        <?php echo language_switcher(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>