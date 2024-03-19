<?php
$highlighted_news_id = $args['highlighted_news_id'];
$title = get_the_title($highlighted_news_id);
$permalink = get_the_permalink($highlighted_news_id);
$image = get_field('highlighted_image', $highlighted_news_id);
$excerpt = get_field('excerpt', $highlighted_news_id);
?>

<section class="section__highlighted-news js-highlighted-news" data-post_id="<?= $highlighted_news_id; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="highlighted-news__wrapper">
                    <a href="<?= $permalink; ?>" class="highlighted-news__wrapper__permalink"></a>
                    <?php if ($image) : ?>
                        <img src="<?= $image['url']; ?>" alt="<?= get_image_alt($image); ?>" class="highlighted-news__wrapper__image ofi-cover-center-center">
                    <?php endif; ?>

                    <div class="highlighted-news__wrapper__text">
                        <div>
                            <h2><?= $title; ?></h2>
                            <?php if ($excerpt) : ?>
                                <p><?= $excerpt; ?></p>
                            <?php endif; ?>
                        </div>

                        <a href="<?= $permalink; ?>" class="btn btn--arrow"><?= __('Tovább', 'lurdy'); ?></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>