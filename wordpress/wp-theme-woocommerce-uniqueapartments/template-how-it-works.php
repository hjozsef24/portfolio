<?php /* Template name: Template: How It Works */ ?>
<?php get_header(); ?>

<?php $main_text = get_field('main_text'); ?>
<?php $progress = get_field('progress'); ?>
<?php $images_and_texts = get_field('image_and_text'); ?>

<?php set_query_var('text', $main_text); ?>
<?php set_query_var('images_and_texts', $images_and_texts); ?>
<?php get_template_part('template-parts/03_organisms/o-text'); ?>

<?php if ($progress) : ?>
    <?php set_query_var('progress', $progress); ?>
    <?php get_template_part('template-parts/03_organisms/o-progress'); ?>
<?php endif; ?>

<?php if ($images_and_texts) : ?>
    <?php foreach ($images_and_texts as $key => $image_text) : ?>
        <?php $image = $image_text['image']; ?>
        <?php $text = $image_text['text']; ?>
        <?php $button = $image_text['button']; ?>

        <?php set_query_var('key', $key); ?>
        <?php set_query_var('image', $image); ?>
        <?php set_query_var('text', $text); ?>
        <?php set_query_var('button', $button); ?>

        <?php get_template_part('template-parts/03_organisms/o-image-text'); ?>
    <?php endforeach; ?>
<?php endif; ?>

<?php get_footer(); ?>