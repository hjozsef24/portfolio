<?php $header_logo = get_field('header_logo', 'options'); ?>
<?php $header_logo_scrolled = get_field('header_logo_scrolled', 'options'); ?>
<?php $header_phone_number = get_field('header_phone_number', 'options'); ?>
<?php $header_live_url = get_field('header_live_url', 'options'); ?>
<?php $is_language_switcher_hidden = get_field('is_language_switcher_hidden', 'options'); ?>
<?php $is_apartment_selector_hidden = get_field('is_apartment_selector_hidden', 'options'); ?>

<header>
    <div class="container-fluid container-fluid--header container-fluid--header--desktop">
        <div class="row align-items-center">
            <div class="col-5 mx-auto">
                <?php /* Secondary navigation */ ?>
                <?php set_query_var('header_phone_number', $header_phone_number); ?>
                <?php set_query_var('header_live_url', $header_live_url); ?>
                <?php set_query_var('is_language_switcher_hidden', $is_language_switcher_hidden); ?>
                <?php set_query_var('is_apartment_selector_hidden', $is_apartment_selector_hidden); ?>
                <?php get_template_part('template-parts/02_molecules/m-header-secondary-navigation'); ?>
            </div>

            <div class="col-2">
                <?php /* Logo */ ?>
                <?php set_query_var('header_logo', $header_logo); ?>
                <?php set_query_var('header_logo_scrolled', $header_logo_scrolled); ?>
                <?php get_template_part('template-parts/02_molecules/m-header-logo'); ?>
            </div>

            <div class="col-5">
                <?php /* Primary navigation */ ?>
                <?php set_query_var('header_live_url', $header_live_url); ?>
                <?php get_template_part('template-parts/02_molecules/m-header-primary-navigation'); ?>
            </div>
        </div>
    </div>

    <div class="header--mobile">
        <?php get_template_part('template-parts/01_atoms/a-hamburger'); ?>

        <?php /* Logo */ ?>
        <?php set_query_var('header_logo', $header_logo); ?>
        <?php set_query_var('header_logo_scrolled', $header_logo_scrolled); ?>
        <?php get_template_part('template-parts/02_molecules/m-header-logo'); ?>

        <?php if ($header_live_url) : ?>
            <?php get_template_part('template-parts/01_atoms/a-live-button'); ?>
            <?php set_query_var('is_language_switcher_hidden', $is_language_switcher_hidden); ?>
            <?php set_query_var('header_phone_number', $header_phone_number); ?>
            <?php get_template_part('template-parts/02_molecules/m-header-mobile-menu'); ?>
        <?php endif; ?>
    </div>

</header>