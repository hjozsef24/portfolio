<?php
$title = get_sub_field('title');
$appstore_url = get_field('appstore_url', 'options');
$google_play_url = get_field('google_play_url', 'options');
?>
<div class="appstore-buttons__wrapper">
    <?php if($title): ?>
        <h5 class="appstore-buttons__title"><?= $title; ?></h5>
    <?php endif; ?>

    <div class="appstore-buttons__wrapper__inner">
        <?php if ($appstore_url) : ?>
            <a href="<?= $appstore_url; ?>" target="_blank">
                <img src="<?= asset('footer__app-store--grey.svg', '', 'images/buttons'); ?>" alt="">
            </a>
        <?php endif; ?>

        <?php if ($google_play_url) : ?>
            <a href="<?= $google_play_url; ?>" target="_blank">
                <img src="<?= asset('footer__google_play--grey.svg', '', 'images/buttons'); ?>" alt="">
            </a>
        <?php endif; ?>
    </div>
</div>