<?php get_header(); ?>

<?php $apartment_id = $_GET['apartment_id'] ? $_GET['apartment_id'] : false ?>

<?php global $wp_query; ?>

<?php $title = woocommerce_page_title(false); ?>
<?php $category_id = $wp_query->get_queried_object_id(); ?>
<?php $category_description = term_description($category_id, 'product_cat'); ?>
<?php $filter_type = get_field('filter_type', 'product_cat_' . $category_id); ?>

<?php set_query_var('title', $title); ?>
<?php set_query_var('text', $category_description); ?>
<?php get_template_part('template-parts/03_organisms/o-text'); ?>

<?php if ($filter_type == 'apartment') : ?>
    <?php set_query_var('apartment_id', $apartment_id); ?>
    <?php get_template_part('template-parts/03_organisms/o-filter-apartments'); ?>
<?php elseif ($filter_type == 'furniture-package') : ?>
    <?php set_query_var('category_id', $category_id); ?>
    <?php get_template_part('template-parts/03_organisms/o-filter-furniture-packages'); ?>
<?php endif; ?>


<?php set_query_var('category_id', $category_id); ?>
<?php get_template_part('template-parts/03_organisms/o-product-list'); ?>

<?php get_footer(); ?>