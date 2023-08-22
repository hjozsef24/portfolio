<?php $wishlist_title = get_field('wishlist_title', 'options'); ?>
<?php $wishlist_subtitle = get_field('wishlist_subtitle', 'options'); ?>
<?php $wishlist_button = get_field('wishlist_button', 'options'); ?>

<div class="wishlist__modal js-wishlist-modal">
    <div class="wishlist__header">
        <div class="js-toggle-wishlist-modal toggle-wishlist-modal">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-white.svg" alt="" class="wishlist__arrow">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-heart-white.svg" alt="" class="wishlist__heart">
        </div>
        <div>
            <?php if ($wishlist_title) : ?>
                <p class="wishlist__header--title"><?php echo $wishlist_title; ?></p>
            <?php endif; ?>

            <?php if ($wishlist_subtitle) : ?>
                <p class="wishlist__header--subtitle"><?php echo $wishlist_subtitle; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <div class="wishlist__body js-wishlist-items-wrapper">
     
    </div>

    <div class="wishlist__footer">
        <a class="btn btn--secondary"><?php _e('Request an offer', 'waterside'); ?></a>
    </div>
</div>