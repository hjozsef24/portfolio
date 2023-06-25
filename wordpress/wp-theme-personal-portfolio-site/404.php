<?php get_header(); ?>

<?php $not_found_text  = get_field('not_found_text', 'options'); ?>
<?php $not_found_image = get_field('not_found_image', 'options'); ?>

<?php set_query_var('text', $not_found_text); ?>
<?php set_query_var('image', $not_found_image); ?>
<?php set_query_var('custom_padding', false); ?>

<?php get_template_part('template-parts/image-and-text'); ?>

<?php get_footer(); ?>