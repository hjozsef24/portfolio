<div class="header-menu--mobile js-mobile-menu">
    <?php if (!$is_search_bar_hidden) : ?>
        <?php get_template_part('template-parts/02_molecules/m-header-search-bar'); ?>
    <?php endif; ?>

    <?php get_template_part('template-parts/02_molecules/m-header-primary-navigation-mobile'); ?>

    <?php get_template_part('template-parts/02_molecules/m-header-secondary-navigation'); ?>
    
</div>