<div class="program-filter">
    <?php if ($dates) : ?>
        <?php set_query_var('dates', $dates); ?>
        <?php get_template_part('template-parts/02_molecules/m-program-filter-pill'); ?>
    <?php endif; ?>

    <div class="d-lg-block d-none">
        <?php if ($ages) : ?>
            <div class="filter__group">
                <?php set_query_var('items', $ages); ?>
                <?php set_query_var('taxonomy', 'programs-category-ages'); ?>
                <?php set_query_var('javascript_checkbox_class', 'js-checkbox-age'); ?>
                <?php set_query_var('title', __('Válassz életkort', 'gyereksziget')); ?>

                <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
                <?php get_template_part('template-parts/02_molecules/m-program-filter-search'); ?>
            </div>
        <?php endif; ?>

        <?php if ($types) : ?>
            <?php set_query_var('items', $types); ?>
            <?php set_query_var('taxonomy', 'programs-category-types'); ?>
            <?php set_query_var('javascript_checkbox_class', 'js-checkbox-type'); ?>
            <?php set_query_var('title', __('Válassz típus szerint', 'gyereksziget')); ?>
            <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
        <?php endif; ?>

        <?php get_template_part('template-parts/02_molecules/m-program-filter-extras'); ?>
    </div>

    <div class="d-lg-none d-flex justify-content-center flex-wrap">
        <?php get_template_part('template-parts/02_molecules/m-program-filter-modal'); ?>
    </div>
</div>