<?php get_header(); ?>

<?php $slider = get_field('slider'); ?>
<?php $short_description = get_field('short_description'); ?>
<?php $developments = get_field('developments'); ?>
<?php $furniture_packages = get_field('furniture_packages'); ?>
<?php $instagram_account = get_field('instagram_account'); ?>
<?php $instagram_feed = get_field('instagram_feed'); ?>

<?php if ($slider) : ?>
    <?php set_query_var('slider', $slider); ?>
    <?php get_template_part('template-parts/03_organisms/o-slider'); ?>
<?php endif; ?>

<?php if ($short_description) : ?>
    <?php set_query_var('text', $short_description); ?>
    <?php get_template_part('template-parts/03_organisms/o-text'); ?>
<?php endif; ?>

<?php if ($developments) : ?>
    <?php set_query_var('developments', $developments); ?>
    <?php get_template_part('template-parts/03_organisms/o-highlighted-developments'); ?>
<?php endif; ?>

<?php if ($furniture_packages) : ?>
    <?php set_query_var('furniture_packages', $furniture_packages); ?>
    <?php get_template_part('template-parts/03_organisms/o-highlighted-furniture-packages'); ?>
<?php endif; ?>

<?php if ($instagram_feed) : ?>
    <?php set_query_var('instagram_account', $instagram_account); ?>
    <?php set_query_var('instagram_feed', $instagram_feed); ?>
    <?php get_template_part('template-parts/03_organisms/o-instagram'); ?>
<?php endif; ?>

<?php get_footer(); ?>