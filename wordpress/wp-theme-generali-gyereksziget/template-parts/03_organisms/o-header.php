<header>
    <?php $header_logo = get_field('header_logo', 'options'); ?>
    <?php $header_logo_text = get_field('header_logo_text', 'options'); ?>
    <?php $generali_logo = get_field('header_generali_logo', 'options'); ?>
    <?php $generali_logo_responsive = get_field('header_generali_logo_responsive', 'options'); ?>
    <?php $is_header_map_hidden = get_field('is_header_map_hidden', 'options'); ?>
    <?php $is_header_profile_hidden = get_field('is_header_profile_hidden', 'options'); ?>
    <?php $languages = language_selector(); ?>
    <?php $template_map_url = get_template_link('template-map.php'); ?>
    <?php $template_account_url = get_template_link('template-account.php'); ?>


    <?php /* Mobil icon section */ ?>
    <?php set_query_var('template_map_url', $template_map_url); ?>
    <?php set_query_var('is_header_map_hidden', $is_header_map_hidden); ?>
    <?php get_template_part('template-parts/01_atoms/a-header-icon-section'); ?>

    <?php /* Logo */ ?>
    <?php set_query_var('header_logo', $header_logo); ?>
    <?php set_query_var('header_logo_text', $header_logo_text); ?>
    <?php get_template_part('template-parts/02_molecules/m-header-logo'); ?>

    <?php /* Desktop menu */ ?>
    <?php get_template_part('template-parts/02_molecules/m-header-menu'); ?>

    <?php /* Desktop secondary navigation */ ?>
    <?php set_query_var('languages', $languages); ?>
    <?php set_query_var('is_header_map_hidden', $is_header_map_hidden); ?>
    <?php set_query_var('is_header_profile_hidden', $is_header_profile_hidden); ?>
    <?php set_query_var('generali_logo', $generali_logo); ?>
    <?php get_template_part('template-parts/02_molecules/m-header-secondary-nav'); ?>


    <?php /* Mobile hamburger */ ?>
    <?php get_template_part('template-parts/01_atoms/a-hamburger'); ?>

    <div class="header-menu--mobile js-mobile-menu">
        <div class="header-menu--mobile--inner">

            <?php get_template_part('template-parts/02_molecules/m-header-menu'); ?>

            <?php set_query_var('generali_logo', $generali_logo_responsive); ?>
            <?php set_query_var('is_header_map_hidden', true); ?>
            <?php set_query_var('is_header_profile_hidden', true); ?>
            <?php get_template_part('template-parts/02_molecules/m-header-secondary-nav'); ?>
        </div>
    </div>
</header>