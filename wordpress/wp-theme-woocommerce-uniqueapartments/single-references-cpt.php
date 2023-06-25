<?php get_header(); ?>

<?php $title = get_the_title(); ?>
<?php $galleries = get_field('galleries'); ?>
<?php $similar_projects = get_field('similar_projects'); ?>

<?php set_query_var('title', $title); ?>
<?php get_template_part('template-parts/03_organisms/o-text'); ?>

<?php if ($galleries) : ?>
    <?php set_query_var('galleries', $galleries); ?>
    <?php get_template_part('template-parts/03_organisms/o-gallery-grid') ?>
<?php endif; ?>

<?php set_query_var('id', $id); ?>
<?php get_template_part('template-parts/03_organisms/o-similar-references') ?>

<?php get_footer(); ?>