<?php
$section_title = get_sub_field('section_title');
$section_title = $section_title ? $section_title : false;

$button = get_sub_field('button');
$button = $button ? $button : false;
$news_events_grid_header_args = compact('section_title', 'button');

$news_events = get_sub_field('news_events');
$news_events_data = $news_events ? 'data-news-events="' . htmlspecialchars(json_encode($news_events), ENT_QUOTES, 'UTF-8') . '" ' : '';
?>

<section class="section__news-events-grid <?= $news_events ? 'section__news-events-grid--individual' : ''; ?>">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php get_template_part('template-parts/02_molecules/m-section-header', '', $news_events_grid_header_args); ?>

                <div class="news-events-grid__wrapper js-news-events-grid" <?= $news_events_data; ?>></div>
                <button type="button" class="btn btn--secondary js-load-more-news-events load-more-news-events">
                    <?= __('További hírek betöltése', 'lurdy') ?>
                </button>

                <?php if ($news_events && $button) : ?>
                    <a href="<?= $button['url']; ?>" class="btn btn--secondary btn--secondary--arrow d-md-none d-flex">
                        <?= $button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.loadNewsEvents();'); ?>