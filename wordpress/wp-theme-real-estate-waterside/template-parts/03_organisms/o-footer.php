<?php $footer_logo = get_field('footer_logo', 'options'); ?>
<?php $footer_social_title = get_field('footer_social_title', 'options'); ?>
<?php $footer_social_icons_and_links = get_field('footer_social_icons_and_links', 'options'); ?>
<?php $footer_main_copyright_text = get_field('footer_main_copyright_text', 'options'); ?>
<?php $footer_secondary_copyright_text = get_field('footer_secondary_copyright_text', 'options'); ?>
<?php $footer_sponsors_partners = get_field('footer_sponsors_partners', 'options'); ?>
<?php $footer_newsletter_title = get_field('footer_newsletter_title', 'options'); ?>
<?php $footer_newsletter_gdpr = get_field('footer_newsletter_gdpr', 'options'); ?>

<footer>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2 col-12">
                <?php set_query_var('footer_logo', $footer_logo); ?>
                <?php set_query_var('footer_social_title', $footer_social_title); ?>
                <?php set_query_var('footer_social_icons_and_links', $footer_social_icons_and_links); ?>
                <?php get_template_part('template-parts/02_molecules/m-footer-branding'); ?>
            </div>

            <div class="col-xxl-3 col-xl-4 offset-xxl-1 col-12">
                <?php set_query_var('footer_main_copyright_text', $footer_main_copyright_text); ?>
                <?php set_query_var('footer_secondary_copyright_text', $footer_secondary_copyright_text); ?>
                <?php get_template_part('template-parts/02_molecules/m-footer-navigation'); ?>
            </div>

            <div class="col-xl-4 col-12">
                <?php set_query_var('footer_newsletter_title', $footer_newsletter_title); ?>
                <?php set_query_var('footer_newsletter_gdpr', $footer_newsletter_gdpr); ?>
                <?php get_template_part('template-parts/02_molecules/m-footer-newsletter'); ?>
            </div>

            <div class="col-xl-2 col-12">
                <?php set_query_var('footer_sponsors_partners', $footer_sponsors_partners); ?>
                <?php get_template_part('template-parts/02_molecules/m-footer-sponsors'); ?>
            </div>
        </div>
    </div>
</footer>