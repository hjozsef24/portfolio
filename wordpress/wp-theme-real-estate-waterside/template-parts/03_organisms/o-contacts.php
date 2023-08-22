<?php $contacts_section_title = get_sub_field('contacts_section_title'); ?>
<?php $is_sales_office_section_hidden = get_sub_field('is_sales_office_section_hidden'); ?>

<?php $gdpr = get_field('contact_form_gdpr', 'options'); ?>
<?php $gdpr_subscribe = get_field('contact_form_subscribe_gdpr', 'options'); ?>
<?php $success_submit_message = get_field('success_submit_message', 'options'); ?>

<section class="section__contacts">
    <div class="container-fluid">
        <?php if ($contacts_section_title) : ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="contacts__main-title"><?php echo $contacts_section_title; ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="offset-xl-1 col-xl-4 col-12">
                <?php if (!$is_sales_office_section_hidden) : ?>
                    <?php $text_block_title = get_field('text_block_title', 'options'); ?>
                    <?php $text_block = get_field('text_block', 'options'); ?>
                    <?php $contacts = get_field('contacts', 'options'); ?>

                    <?php if ($text_block_title) : ?>
                        <p class="contacts__subtitle"><?php echo $text_block_title; ?></p>
                    <?php endif; ?>

                    <?php if ($text_block) : ?>
                        <div class="contacts__text-block__text"><?php echo $text_block; ?></div>
                    <?php endif; ?>

                    <?php if ($contacts) : ?>
                        <?php set_query_var('contacts', $contacts); ?>
                        <?php get_template_part('template-parts/02_molecules/m-contact-details'); ?>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="offset-xl-2 col-xl-4 col-12">
                <p class="contacts__subtitle js-hide-on-success contacts__subtitle__responsive-padding"><?php _e('request a callback', 'waterside'); ?></p>

                <?php set_query_var('gdpr', $gdpr); ?>
                <?php set_query_var('gdpr_subscribe', $gdpr_subscribe); ?>
                <?php get_template_part('template-parts/02_molecules/m-contact-form'); ?>

                <?php set_query_var('success_submit_message', $success_submit_message); ?>
                <?php get_template_part('template-parts/02_molecules/m-contact-form-success'); ?>
            </div>
        </div>
    </div>
</section>