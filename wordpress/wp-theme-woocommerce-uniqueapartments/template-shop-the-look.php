<?php /* Template name: Template: Shop The Look */ ?>
<?php get_header(); ?>

<?php $main_text = get_the_content(); ?>
<?php $filter_title = get_field('filter_title'); ?>

<?php set_query_var('text', $main_text); ?>
<?php get_template_part('template-parts/03_organisms/o-text'); ?>

<?php $categories = get_terms(array('taxonomy' => 'shop-the-look-category', 'hide_empty' => true)); ?>

<?php if ($categories) : ?>
    <?php set_query_var('filter_title', $filter_title); ?>
    <?php set_query_var('categories', $categories); ?>
    <?php get_template_part('template-parts/03_organisms/o-filter-shop-the-look'); ?>
<?php endif; ?>

<?php get_template_part('template-parts/03_organisms/o-shop-the-look-grid'); ?>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>