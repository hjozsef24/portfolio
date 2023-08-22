<?php if ($footer_logo) : ?>
    <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo get_image_alt($footer_logo); ?>" class="footer__logo ofi-contain-center-center">
<?php endif; ?>

<?php if ($footer_social_icons_and_links) : ?>
    <?php if ($footer_social_title) : ?>
        <p class="footer__social-title"><?php echo $footer_social_title; ?></p>
    <?php endif; ?>

    <div class="footer__social-icon__wrapper">
        <?php foreach ($footer_social_icons_and_links as $social) : ?>
            <?php $url = $social['link']; ?>
            <?php $image = $social['image']; ?>

            <a href="<?php echo $url; ?>" target="_blank" class="footer__social-icon">
                <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>