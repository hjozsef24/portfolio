<?php
// Template name: Sablon: Hírek és események archív

get_header();

$title = get_the_title();
$highlighted_news = get_field('highlighted_news');

if (!$highlighted_news) {
    $highlighted_news = get_posts(array(
        'numberposts'    => 1,
        'post_type'      => 'news-cpt',
        'post_status'    => 'publish',
        'orderby'        => 'date',
        'order'          => 'DESC',
        'fields'         => 'ids',
        'suppress_filters' => false,
    ));
}

$highlighted_news_id = $highlighted_news ? $highlighted_news[0] : false;
wp_reset_postdata();
?>

<main class="template template--news-events">
    <?php get_template_part('template-parts/03_organisms/o-section-title', '', compact('title')); ?>
    
    <?php if ($highlighted_news_id) : ?>
        <?php get_template_part('template-parts/03_organisms/o-highlighted-news', '', compact('highlighted_news_id')); ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/03_organisms/o-news-events-grid'); ?>
</main>

<?php get_footer(); ?>