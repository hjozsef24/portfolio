<?php $slides = get_sub_field('hero_slides'); ?>
<?php $hero_type = get_sub_field('hero_type'); ?>
<?php $hero_video = get_sub_field('hero_video'); ?>
<?php $hero_video_text = get_sub_field('hero_video_text'); ?>
<?php $hero_slider_text_section = get_sub_field('hero_slider_text_section'); ?>
<?php $is_hero_slider_text_section_hidden = get_sub_field('is_hero_slider_text_section_hidden'); ?>


<?php if ($hero_type == 'slider') : ?>
    <?php set_query_var('slides', $slides); ?>
    <?php set_query_var('hero_slider_text_section', $hero_slider_text_section); ?>
    <?php set_query_var('is_hero_slider_text_section_hidden', $is_hero_slider_text_section_hidden); ?>
    <?php get_template_part('template-parts/02_molecules/m-hero-slider-slides'); ?>
<?php endif; ?>

<?php if ($hero_type == 'video') : ?>
    <?php set_query_var('hero_video', $hero_video); ?>
    <?php set_query_var('hero_video_text', $hero_video_text); ?>
    <?php get_template_part('template-parts/02_molecules/m-hero-slider-video'); ?>
<?php endif; ?>
