<?php
$poster = $args['poster'];
$title = $args['title'];
$times = $args['times'];
$premier = $args['premier'];
$age = $args['age'];
$url = $args['url'];
?>

<div class="card__movie">

    <?php if ($url) : ?>
        <a class="card__movie__link" target="_blank" href="<?= $url; ?>"></a>
    <?php endif; ?>

    <?php if ($premier) : ?>
        <p class="premier-tag"><?= __('Premier', 'lurdy') . ': ' . $premier ?></p>
    <?php endif; ?>

    <?php if ($poster) : ?>
        <div class="image__wrapper">
            <img src="<?= $poster ?>" alt="Poster" class="ofi-cover-center-center">
        </div>
    <?php endif; ?>

    <div class="card__movie__inner__wrapper js-card-movie-inner">

        <div class="card__movie__inner__header">
            <?php if ($title) : ?>
                <h6><?= $title; ?></h6>
            <?php endif; ?>

            <?php if ($age) : ?>
                <p class="age-tag"><?= $age; ?></p>
            <?php endif; ?>
        </div>

        <?php if ($times) : ?>
            <div class="times__wrapper">
                <p class="times__wrapper__title"><?= __('Következő vetítések', 'lurdy') ?>:</p>

                <div class="times">
                    <?php foreach ($times as $t) : ?>
                        <a target="_blank" href="<?= $t['url']; ?>" class="time-tag"><?= $t['time']; ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>