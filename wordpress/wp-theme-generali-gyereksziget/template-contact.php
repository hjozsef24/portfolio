<?php /* Template name: Sablon: Kapcsolat oldal */ ?>
<?php get_header(); ?>

<?php get_flexible_content(); ?>

<?php $form_title = get_field('form_title'); ?>
<?php $topics = get_field('topics'); ?>
<?php $gdpr_text = get_field('gdpr_text'); ?>

<section class="contact">
    <div class="container-fluid custom-container-spacing">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-xl-6 col-lg-8 col-md-10 col-12">
                <div class="form__wrapper">
                    <?php if ($form_title) : ?>
                        <h3><?php echo $form_title; ?></h3>
                    <?php endif; ?>
                    <?php set_query_var('topics', $topics); ?>
                    <?php set_query_var('gdpr_text', $gdpr_text); ?>
                    <?php get_template_part('template-parts/03_organisms/o-contact-form'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php /* Get the modal after form submit */ ?>
<?php $modal_success_title = get_field('modal_success_title'); ?>
<?php $modal_unsuccess_title = get_field('modal_unsuccess_title'); ?>
<?php $modal_success_text = get_field('modal_success_text'); ?>
<?php $modal_unsuccess_text = get_field('modal_unsuccess_text'); ?>
<?php $modal_success_button = get_field('modal_success_button'); ?>
<?php $modal_unsuccess_button = get_field('modal_unsuccess_button'); ?>

<?php set_query_var('modal_success_title', $modal_success_title); ?>
<?php set_query_var('modal_unsuccess_title', $modal_unsuccess_title); ?>
<?php set_query_var('modal_success_text', $modal_success_text); ?>
<?php set_query_var('modal_unsuccess_text', $modal_unsuccess_text); ?>
<?php set_query_var('modal_success_button', $modal_success_button); ?>
<?php set_query_var('modal_unsuccess_button', $modal_unsuccess_button); ?>

<?php get_template_part('template-parts/03_organisms/o-modal-contact'); ?>

<?php get_footer(); ?>