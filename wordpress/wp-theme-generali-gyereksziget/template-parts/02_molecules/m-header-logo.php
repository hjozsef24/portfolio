<div class="header-logo__wrapper">
    <?php if ($header_logo) : ?>
        <a href="<?php echo HOME_URL; ?>" class="d-block my-auto">
            <img src="<?php echo $header_logo['url']; ?>" alt="<?php echo get_image_alt($header_logo); ?>" class="header-logo">
        </a>
    <?php endif; ?>

    <?php if ($header_logo_text) : ?>
        <div class="header-logo--text__wrapper">
            <p class="header-logo--text"><?php echo $header_logo_text; ?></p>
        </div>
    <?php endif; ?>
</div>