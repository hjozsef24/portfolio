<?php get_header(); ?>
<?php $categories = get_terms('publications-category', array('hide_empty' => true)); ?>
<?php $publications_archive_url = get_post_type_archive_link('publications-cpt'); ?>
<?php $highlighted_publication = get_field('highlighted_publication', 'options'); ?>
<?php
$search_query = get_search_query();
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'publications-cpt',
    'post_status' => 'publish',
    'posts_per_page' => 12,
    'order' => 'DESC',
    'orderby' => 'date',
    'paged' => $paged
);

if ($search_query != '') {
    $args['s'] = $search_query;
}

$query = new WP_Query($args);
?>

<main class="template template--archive-publications">
    <section class="section__archive-publications__header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1><?php _e('Publications', 'waterside'); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section__archive-publications__navigation">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-6 col-12">
                    <?php if ($categories) : ?>
                        <div class="category-badge__wrapper">
                            <a class="category-badge is-active" href="<?php echo $publications_archive_url; ?>"><?php _e('All', 'waterside'); ?></a>

                            <?php foreach ($categories as $category) : ?>
                                <?php $category_link = get_term_link($category, 'publications-cpt'); ?>
                                <a href="<?php echo $category_link; ?>" class="category-badge">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="offset-xl-1 col-xl-3 col-12">
                    <form method="GET" action="<?php echo htmlentities($publications_archive_url); ?>" class="publications--search-form">
                        <input type="image" name="submit" src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-search-blue.svg">
                        <input type="text" name="s" value="<?php the_search_query(); ?>" placeholder="<?php _e('Search', 'waterside'); ?>">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php if ($highlighted_publication && $search_query == '') : ?>
        <?php $highlighted_publication_id = $highlighted_publication[0]; ?>
        <?php set_query_var('post_id', $highlighted_publication_id); ?>
        <?php get_template_part('template-parts/02_molecules/cards/m-highlighted-publication-card'); ?>
    <?php endif; ?>

    <?php if ($query->have_posts()) : ?>
        <section class="section__archive-publications__posts">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-12">
                        <div class="row">
                            <?php while ($query->have_posts()) : $query->the_post() ?>
                                <?php $id = get_the_ID(); ?>
                                <div class="col-xl-4 col-sm-6 col-12">
                                    <?php get_publication_card($id); ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-10 col-12">
                        <?php set_query_var('query', $query); ?>
                        <?php get_template_part('template-parts/03_organisms/o-pagination'); ?>
                    </div>
                </div>
                <?php wp_reset_query(); ?>
            </div>
        </section>
    <?php endif; ?>
</main>
<?php get_footer(); ?>