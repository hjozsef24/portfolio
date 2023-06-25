<?php if ($header_logo) : ?>
    <a href="<?php echo HOME_URL; ?>">
        <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo get_image_alt($header_logo); ?>" class="header--logo">
    </a>
<?php endif; ?>