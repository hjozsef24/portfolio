<?php if ($footer_logo) : ?>
    <a href="<?php echo HOME_URL; ?>">
        <img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo get_image_alt($footer_logo); ?>" class="footer--logo">
    </a>
<?php endif; ?>