<?php /* Template name: Sikeres kapcsolatfelvétel sablon */ ?>
<?php get_header(); ?>

<?php $success_form_submit_text  = get_field('success_form_submit_text'); ?>
<?php $success_form_submit_image = get_field('success_form_submit_image'); ?>

<?php set_query_var('text', $success_form_submit_text); ?>
<?php set_query_var('image', $success_form_submit_image); ?>
<?php set_query_var('custom_padding', false); ?>

<?php get_template_part('template-parts/image-and-text'); ?>

<?php get_footer(); ?>