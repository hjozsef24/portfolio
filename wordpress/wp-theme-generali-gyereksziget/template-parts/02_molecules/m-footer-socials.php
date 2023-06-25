<?php $social_media_items = get_field('footer_social_media', 'options'); ?>

<?php if ($social_media_items) : ?>
    <div class="footer-socials__wrapper">
        <?php foreach ($social_media_items as $social_media_item) : ?>
            <?php $icon = $social_media_item['icon']; ?>
            <?php $link = $social_media_item['link']; ?>

            <a href="<?php echo $link; ?>">
                <img class="d-block my-auto" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
            </a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>