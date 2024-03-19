<?php
$title = $args['title'];
$permalink = $args['permalink'];
$highlighted_image = $args['highlighted_image'];
$excerpt = $args['excerpt'];
$dates = $args['dates'];
$places = $args['places'];
$websites = $args['websites'];
?>

<div class="card__news-events">
    <a href="<?= $permalink; ?>" class="card__news-events__permalink"></a>
    <?php if ($highlighted_image) : ?>
        <div class="card__news-events__image__wrapper">
            <img src="<?= $highlighted_image['url']; ?>" alt="<?= get_image_alt($highlighted_image); ?>" class="card__news-events__image ofi-cover-center-center">
        </div>
    <?php endif; ?>

    <div class="card__news-events__inner">
        <?php if ($title) : ?>
            <h4><?= $title; ?></h4>
        <?php endif; ?>

        <?php if ($excerpt) : ?>
            <p><?= $excerpt; ?></p>
        <?php endif; ?>

        <?php if ($dates) : ?>
            <p class="card__news-events__date">
                <?php foreach ($dates as $i => $d) : ?>
                    <?php
                    $date = $d['date'] ?? '';
                    $starts_at = $d['starts_at'] ?? '';
                    $ends_at = $d['ends_at'] ?? '';

                    $formatted_date = ($date ? $date . ' ' : '') . ($starts_at ? $starts_at . ' ' : '') . ($ends_at ? '- ' . $ends_at : '');
                    $formatted_date = (count($dates) > 1 && $i != array_key_last($dates)) ? $formatted_date . ', ' : $formatted_date;
                    ?>

                    <?php if ($formatted_date) : ?>
                        <?= $formatted_date; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>

        <?php if ($places) : ?>
            <p class="card__news-events__place">
                <?= __('Helyszín', 'lurdy') ?>:

                <?php foreach ($places as $i => $p) : ?>
                    <?php
                    $place = $p['place'];
                    $formatted_place = (count($places) > 1 && $i != array_key_last($places)) ? $place . ', ' : $place;
                    ?>

                    <?php if ($formatted_place) : ?>
                        <?= $formatted_place; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
        <?php endif; ?>
    </div>
</div>