<?php $gdpr = get_field('contact_form_gdpr', 'options'); ?>
<?php $gdpr_subscribe = get_field('contact_form_subscribe_gdpr', 'options'); ?>

<section class="section__request-modal js-request-offer-modal">
    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-x-blue.svg" alt="" class="js-close-request-modal close-request-modal">
    <h4 class="section__request-modal__title"><?php _e('Request offer'); ?></h4>

    <?php set_query_var('gdpr', $gdpr); ?>
    <?php set_query_var('gdpr_subscribe', $gdpr_subscribe); ?>
    <?php get_template_part('template-parts/02_molecules/m-contact-form'); ?>

    <?php set_query_var('success_submit_message', $success_submit_message); ?>
    <?php get_template_part('template-parts/02_molecules/m-contact-form-success'); ?>
</section>