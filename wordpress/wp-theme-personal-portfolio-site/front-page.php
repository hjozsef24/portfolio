<?php get_header(); ?>

<?php $introduction_text  = get_field('introduction_text'); ?>
<?php $introduction_image = get_field('introduction_image'); ?>

<?php set_query_var('text', $introduction_text); ?>
<?php set_query_var('image', $introduction_image); ?>

<?php get_template_part('template-parts/image-and-text'); ?>


<?php $lists_main_title = get_field('lists_main_title'); ?>
<?php $lists = get_field('lists'); ?>

<?php set_query_var('lists', $lists); ?>
<?php set_query_var('lists_main_title', $lists_main_title); ?>

<?php get_template_part('template-parts/listing'); ?>


<?php get_footer(); ?>