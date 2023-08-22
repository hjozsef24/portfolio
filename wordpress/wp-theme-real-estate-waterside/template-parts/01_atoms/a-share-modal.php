<?php $facebook = "https://www.facebook.com/sharer/sharer.php?u=" . $permalink ?>

<div class="share-modal__wrapper js-share-modal">
    <a href="<?php echo $facebook; ?>" target="_blank"><?php _e('Facebook', 'waterside'); ?></a>

    <div class="share-modal__wrapper--divider"></div>

    <p class="js-copy-url" data-permalink="<?php echo $permalink; ?>">
        <?php _e('Copy link', 'waterside'); ?>
    </p>
</div>