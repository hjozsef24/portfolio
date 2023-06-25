<?php // Declare variables 
?>
<?php $header_logo = get_field('header_logo', 'options'); ?>
<?php $header_logo_mobile = get_field('header_logo_mobile', 'options'); ?>
<?php $is_search_bar_hidden = get_field('is_search_bar_hidden', 'options'); ?>
<?php $is_language_switcher_hidden = get_field('is_language_switcher_hidden', 'options'); ?>
<?php $is_login_menu_hidden = get_field('is_login_menu_hidden', 'options'); ?>
<?php $is_wishlist_menu_hidden = get_field('is_wishlist_menu_hidden', 'options'); ?>
<?php $is_bundle_menu_hidden = get_field('is_bundle_menu_hidden', 'options'); ?>

<header>
    <div class="header--main__wrapper header--main__wrapper--desktop">
        <?php /* Search bar */ ?>
        <?php if (!$is_search_bar_hidden) : ?>
            <?php get_template_part('template-parts/02_molecules/m-header-search-bar'); ?>
        <?php endif; ?>


        <?php /* Logo */ ?>
        <?php set_query_var('header_logo', $header_logo); ?>
        <?php get_template_part('template-parts/02_molecules/m-header-logo'); ?>


        <?php /* Secondary navigation */ ?>
        <?php set_query_var('is_language_switcher_hidden', $is_language_switcher_hidden); ?>
        <?php set_query_var('is_login_menu_hidden', $is_login_menu_hidden); ?>
        <?php set_query_var('is_wishlist_menu_hidden', $is_wishlist_menu_hidden); ?>
        <?php set_query_var('is_bundle_menu_hidden', $is_bundle_menu_hidden); ?>
        <?php get_template_part('template-parts/02_molecules/m-header-secondary-navigation'); ?>

    </div>

    <?php /* Primary nav section */ ?>
    <?php get_template_part('template-parts/02_molecules/m-header-primary-navigation'); ?>

    <div class="header--main__wrapper--mobile">
        <?php /* Mobile logo */ ?>
        <?php set_query_var('header_logo', $header_logo_mobile); ?>
        <?php get_template_part('template-parts/02_molecules/m-header-logo'); ?>

        <div class="submenu__wrapper">

            <?php /* Mobile account menu */ ?>
            <?php if (!$is_login_menu_hidden) : ?>
                <?php get_template_part('template-parts/01_atoms/a-header-account'); ?>
            <?php endif; ?>

            <?php /* Hamburger toggle + menu */ ?>
            <?php get_template_part('template-parts/01_atoms/a-hamburger'); ?>
        </div>

        <?php set_query_var('is_search_bar_hidden', $is_search_bar_hidden); ?>
        <?php set_query_var('is_wishlist_menu_hidden', $is_wishlist_menu_hidden); ?>
        <?php set_query_var('is_bundle_menu_hidden', $is_bundle_menu_hidden); ?>
        <?php get_template_part('template-parts/03_organisms/o-header-menu-mobile'); ?>

    </div>
</header>

<?php /* Breadcrumb section */ ?>
<?php get_template_part('template-parts/00_base/breadcrumb'); ?>