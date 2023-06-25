<div class="map--secondary-filter map--secondary-filter--desktop program-filter">
    <?php $ages = get_terms('programs-category-ages', array('hide_empty' => true)); ?>
    <?php $types = get_terms('programs-category-types', array('hide_empty' => true)); ?>

    <?php set_query_var('items', $ages); ?>
    <?php set_query_var('javascript_checkbox_class', 'js-checkbox-age'); ?>
    <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>

    <?php set_query_var('items', $types); ?>
    <?php set_query_var('javascript_checkbox_class', 'js-checkbox-type'); ?>
    <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
</div>

<div class="map--secondary-filter map--secondary-filter--tablet program-filter">
    <?php $ages = get_terms('programs-category-ages', array('hide_empty' => true)); ?>
    <?php $types = get_terms('programs-category-types', array('hide_empty' => true)); ?>

    <?php if ($ages) : ?>
        <div>
            <div class="js-checkbox-filter-accordion checkbox__wrapper--accordion"><?php _e('Minden életkor', 'gyereksziget'); ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/chevron-blue.svg" alt="" class="arrow">
            </div>
            <?php set_query_var('items', $ages); ?>
            <?php set_query_var('javascript_checkbox_class', 'js-checkbox-age'); ?>
            <div class="js-checkbox-filter checkbox-filter__container">
                <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($types) : ?>
        <div>
            <div class="js-checkbox-filter-accordion checkbox__wrapper--accordion"><?php _e('Minden kategória', 'gyereksziget'); ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/chevron-blue.svg" alt="" class="arrow">
            </div>
            <?php set_query_var('items', $types); ?>
            <?php set_query_var('javascript_checkbox_class', 'js-checkbox-type'); ?>
            <div class="js-checkbox-filter checkbox-filter__container">
                <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
            </div>
        </div>
    <?php endif; ?>
</div>