<?php $highlighted_post_id = $highlighted_post[0]; ?>
<?php $highlighted_title = get_the_title($highlighted_post_id); ?>
<?php $highlighted_permalink = get_the_permalink($highlighted_post_id); ?>
<?php $highlighted_excerpt = get_field('excerpt', $highlighted_post_id); ?>
<?php $highlighted_thumbnail = get_field('thumbnail', $highlighted_post_id); ?>
<?php $highlighted_date = get_the_date('Y.m.d', $highlighted_post_id); ?>
<div class="news__highlighted__wrapper">
    <div class="news__highlighted__image">
        <a href="<?= $highlighted_permalink; ?>">
            <img src="<?= $highlighted_thumbnail['url']; ?>" alt="" srcset="">
        </a>
    </div>
    <div class="news__highlighted__text_wrapper">
        <a href="<?= $highlighted_permalink; ?>">
            <h2 class="news__highlighted__title"> <?= $highlighted_title; ?></h2>
        </a>
        <p class="news__highlighted__excerpt"><?= $highlighted_excerpt; ?></p>
        <p class="news__highlighted__date"><?= $highlighted_date; ?></p>
        <a class="news__highlighted__btn" href="<?= $highlighted_permalink; ?>"><?php _e('Tovább ', 'gyereksziget'); ?> </a>
    </div>
</div>