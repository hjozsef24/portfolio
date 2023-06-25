<?php $cta_post = get_field('footer_cta_sections', 'options') ?>
<?php if ($cta_post) : ?>
    <?php set_query_var('cta_post', $cta_post) ?>
    <?php get_template_part('template-parts/03_organisms/o-cta') ?>
<?php endif; ?>

<?php get_template_part('template-parts/03_organisms/o-sponsors') ?>
<?php get_template_part('template-parts/03_organisms/o-footer') ?>

<?php /* Get the modal after form submit */ ?>
<?php $newsletter_modal_success_title = get_field('newsletter_modal_success_title', 'options'); ?>
<?php $newsletter_modal_unsuccess_title = get_field('newsletter_modal_unsuccess_title', 'options'); ?>
<?php $newsletter_modal_success_text = get_field('newsletter_modal_success_text', 'options'); ?>
<?php $newsletter_modal_unsuccess_text = get_field('newsletter_modal_unsuccess_text', 'options'); ?>
<?php $newsletter_modal_success_button = get_field('newsletter_modal_success_button', 'options'); ?>
<?php $newsletter_modal_unsuccess_button = get_field('newsletter_modal_unsuccess_button', 'options'); ?>

<?php set_query_var('modal_success_title', $newsletter_modal_success_title); ?>
<?php set_query_var('modal_unsuccess_title', $newsletter_modal_unsuccess_title); ?>
<?php set_query_var('modal_success_text', $newsletter_modal_success_text); ?>
<?php set_query_var('modal_unsuccess_text', $newsletter_modal_unsuccess_text); ?>
<?php set_query_var('modal_success_button', $newsletter_modal_success_button); ?>
<?php set_query_var('modal_unsuccess_button', $newsletter_modal_unsuccess_button); ?>
<?php get_template_part('template-parts/03_organisms/o-modal-newsletter'); ?>

<div class="d-none">
    <?php tracking_code(3); ?>
</div>

<?php wp_footer(); ?>

</body>

</html>