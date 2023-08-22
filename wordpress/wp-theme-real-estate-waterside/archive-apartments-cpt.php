<?php get_header(); ?>
<?php $args = create_apartment_filter_query_args(); ?>
<?php $qry = new WP_Query($args); ?>
<?php $found_posts = $qry->found_posts; ?>

<main class="template template--archive-apartments">

    <?php set_query_var('found_posts', $found_posts); ?>
    <?php get_template_part('template-parts/03_organisms/o-search-bar'); ?>
    
    <?php set_query_var('qry', $qry); ?>
    <?php get_template_part('template-parts/03_organisms/o-apartments-list'); ?>
</main>

<?php get_footer(); ?>