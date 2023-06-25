<?php if ($extra_button) : ?>
    <button class="js-init-program-list-modal program-filter--modal-button program-filter--list-button" type="button"><?php _e('Lista', 'gyereksziget') ?></button>
<?php endif; ?>

<button class="js-init-program-filter-modal d-md-none d-flex program-filter--modal-button" type="button"><?php _e('Szűrés', 'gyereksziget') ?></button>

<div class="program-filter--modal__wrapper js-program-filter-modal flex-wrap">
    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/close-x-white.svg" alt="" class="program-filter--modal-close js-close-program-filter-modal d-md-none d-flex">
    <?php get_template_part('template-parts/02_molecules/m-program-filter-search'); ?>

    <?php if ($ages) : ?>
        <div class="checkbox-filter__container">
            <div class="js-checkbox-filter-accordion checkbox__wrapper--accordion"><?php _e('Minden életkor', 'gyereksziget'); ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/chevron-blue.svg" alt="" class="arrow">
            </div>

            <?php set_query_var('items', $ages); ?>
            <?php set_query_var('taxonomy', 'programs-category-ages'); ?>
            <?php set_query_var('javascript_checkbox_class', 'js-checkbox-age'); ?>
            <?php set_query_var('title', false); ?>

            <div class="js-checkbox-filter checkbox-filter--mobile">
                <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($types) : ?>
        <div class="checkbox-filter__container">
            <div class="js-checkbox-filter-accordion checkbox__wrapper--accordion"><?php _e('Minden kategória', 'gyereksziget'); ?>
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/chevron-blue.svg" alt="" class="arrow">
            </div>

            <?php set_query_var('items', $types); ?>
            <?php set_query_var('taxonomy', 'programs-category-types'); ?>
            <?php set_query_var('javascript_checkbox_class', 'js-checkbox-type'); ?>
            <?php set_query_var('title', false); ?>

            <div class="js-checkbox-filter checkbox-filter--mobile">
                <?php get_template_part('template-parts/02_molecules/m-program-filter-checkbox'); ?>
            </div>
        </div>
    <?php endif; ?>

    <button type="button" class="btn--centered js-checkbox-filter-show-programs d-md-none d-flex ">
        <?php _e('Mutasd', 'gyereksziget'); ?>
        <span class="filtered-programs-counter">
            (<span class="js-filtered-programs-counter"></span>
            <?php _e('találat', 'gyereksziget'); ?>)
        </span>
    </button>


    <div class="filtered-programs-counter--tablet">
        <span class="filtered-programs-counter">
            <span class="js-filtered-programs-counter"></span>
            <?php _e('találat', 'gyereksziget'); ?>
        </span>
    </div>
</div>