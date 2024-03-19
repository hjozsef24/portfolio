<?php
$appstore_url = $args['appstore_url'];
$google_play_url = $args['google_play_url'];
$footer_social_media = $args['footer_social_media'];
?>
<div class="footer__additional">
    <?php if ($footer_social_media) : ?>
        <div class="footer__social_media">
            <?php foreach ($footer_social_media as $fsm) : ?>
                <?php $fsm_url = $fsm['url']; ?>
                <?php $fsm_image = $fsm['icon']; ?>

                <a href="<?= $fsm_url; ?>" target="_blank">
                    <img src="<?= $fsm_image['url']; ?>" alt="<?= get_image_alt($fsm_image); ?>">
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if ($appstore_url || $google_play_url) : ?>
        <div class="footer__apps">
            <?php if ($appstore_url) : ?>
                <a href="<?= $appstore_url; ?>" target="_blank">
                    <img src="<?= asset('footer__app-store.svg', '', 'images/buttons'); ?>" alt="">
                </a>
            <?php endif; ?>

            <?php if ($google_play_url) : ?>
                <a href="<?= $google_play_url; ?>" target="_blank">
                    <img src="<?= asset('footer__google_play.svg', '', 'images/buttons'); ?>" alt="">
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>