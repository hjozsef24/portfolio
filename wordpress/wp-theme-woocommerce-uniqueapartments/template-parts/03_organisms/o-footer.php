<?php // Declare variables ?>
<?php $footer_logo = get_field('footer_logo', 'options'); ?>
<?php $footer_follow_us_text = get_field('footer_follow_us_text', 'options'); ?>
<?php $footer_follow_us_icons_and_links = get_field('footer_follow_us_icons_and_links', 'options'); ?>

<footer>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5">
                <?php set_query_var('footer_logo', $footer_logo); ?>
                <?php get_template_part('template-parts/02_molecules/m-footer-logo') ?>

                <?php set_query_var('footer_follow_us_text', $footer_follow_us_text); ?>
                <?php set_query_var('footer_follow_us_icons_and_links', $footer_follow_us_icons_and_links); ?>
                <?php get_template_part('template-parts/02_molecules/m-footer-follow-us') ?>
            </div>

            <div class="col-xl-4 col-md-7">
                <?php get_template_part('template-parts/02_molecules/m-footer-primary-navigation'); ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php get_template_part('template-parts/02_molecules/m-footer-secondary-navigation'); ?>
            </div>
        </div>
    </div>
    </div>
</footer>