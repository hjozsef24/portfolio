<?php
get_header();

$post = get_queried_object();
$post_type = $post->post_type;

if ($post_type === 'news-cpt' || $post_type === 'events-cpt') :

    $title = get_the_title();
    $post_date = $post_type == 'news-cpt' ? get_the_date('Y.m.d.') : false;
    $highlighted_image = get_field('highlighted_image');
    $overlay_is_hidden = get_field('overlay_is_hidden');
    $template_news_url = get_template_link('template-news-events.php');
    $back_to_link_title = __('Vissza a hírekhez', 'lurdy');
    $excerpt = $dates = $places = $websites = false;

    if ($post_type === 'events-cpt') {
        $excerpt = get_field('excerpt');
        $dates = get_field('dates');
        $places = get_field('places');
        $websites = get_field('websites');
        $events_information_args = compact('excerpt', 'dates', 'places', 'websites');
    }


    $hero_args = compact('highlighted_image', 'overlay_is_hidden', 'title', 'post_date');
    $back_to_link_args = [
        'url' => $template_news_url,
        'title' => $back_to_link_title
    ];
?>
    <main class="single single--news-cpt">
        <?php generate_breadcrumb(); ?>

        <div class="d-xl-none d-block section_back-to-link--top">
            <?php get_template_part('template-parts/03_organisms/o-back-to-link', '', $back_to_link_args); ?>
        </div>

        <?php
        get_template_part('template-parts/03_organisms/o-post-type-hero', '', $hero_args);

        if ($post_type === 'events-cpt') {
            get_template_part('template-parts/03_organisms/o-single-events-information', '', $events_information_args);
        }

        get_flexible_content();
        ?>
    </main>
<?php endif; ?>
<?php get_footer(); ?>