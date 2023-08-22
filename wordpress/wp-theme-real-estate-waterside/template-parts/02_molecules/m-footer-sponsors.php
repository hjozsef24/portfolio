<?php if ($footer_sponsors_partners) : ?>
    <div class="footer__sponsors__wrapper">
        <?php foreach ($footer_sponsors_partners as $sponsor) : ?>
            <?php $image = $sponsor['image']; ?>
            <?php $link = $sponsor['link']; ?>

            <?php if ($link) : ?>
                <a href="<?php echo $link; ?>" target="_blank">
                <?php endif; ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">

                <?php if ($link) : ?>
                </a>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>