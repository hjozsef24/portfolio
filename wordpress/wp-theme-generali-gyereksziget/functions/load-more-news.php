<?php
function load_more_news()
{
    $offset = $_POST['data']['offset'];

    $args = array(
        'post_type' => 'news-cpt',
        'post_status' => 'publish',
        'posts_per_page' => 3,
        'order' => 'ASC',
        'orderby' => 'title',
        'offset' => $offset,
    );

    $qry = new WP_Query($args);
?>

    <?php if ($qry->have_posts()) : ?>
        <?php while ($qry->have_posts()) : $qry->the_post() ?>
            <?php $id = get_the_ID(); ?>
            <div class="col-xxl-4 col-md-6 col-12 custom-container-spacing">
                <?php get_news_card($id); ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

<?php
    wp_die();
}

add_action('wp_ajax_load_more_news', 'load_more_news');
add_action('wp_ajax_nopriv_load_more_news', 'load_more_news');
