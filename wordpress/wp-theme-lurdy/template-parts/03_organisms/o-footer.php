<?php
$footer_logo = get_field('footer_logo', 'options');
$appstore_url = get_field('appstore_url', 'options');
$google_play_url = get_field('google_play_url', 'options');
$footer_social_media = get_field('footer_social_media', 'options');

$footer_additional_args = compact('appstore_url', 'google_play_url', 'footer_social_media');
?>

<footer>
    <?php if ($footer_logo) : ?>
        <a href="<?= HOME_URL; ?>" class="footer__logo ofi-contain-center-center">
            <img src="<?= $footer_logo['url']; ?>" alt="<?= get_image_alt($footer_logo); ?>">
        </a>
    <?php endif; ?>

    <?php 
    get_template_part('template-parts/02_molecules/footer/m-footer-navigation');
    get_template_part('template-parts/02_molecules/footer/m-footer-additional', '', $footer_additional_args);
    get_template_part('template-parts/02_molecules/footer/m-footer-subnavigation');
    ?>
</footer>