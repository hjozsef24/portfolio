<?php if ($footer_follow_us_text) : ?>
    <p class="footer--follow-us-text"><?php echo $footer_follow_us_text; ?></p>
<?php endif; ?>

<?php if ($footer_follow_us_icons_and_links) : ?>
    <?php foreach ($footer_follow_us_icons_and_links as $icon_and_link) : ?>
        <?php $icon = $icon_and_link['image']; ?>
        <?php $link = $icon_and_link['link']; ?>

        <a href="<?php echo $link; ?>">
            <img src="<?php echo $icon['url']; ?>" alt="<?php echo get_image_alt($icon); ?>" class="footer--social-icon">
        </a>
    <?php endforeach; ?>
<?php endif; ?>