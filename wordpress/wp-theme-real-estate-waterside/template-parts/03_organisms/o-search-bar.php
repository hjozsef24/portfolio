<?php $params = get_filter_params_from_url(); ?>
<?php $default_params = $params['default']; ?>
<?php $labeled_params = $params['labeled']; ?>

<section class="section__search-bar">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="section__search-bar__filters">
                    <form action="">
                        <div class="section__search-bar__input__wrapper">
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-area') ?>
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-rooms') ?>
                            <?php set_query_var('divider', true); ?>
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-floor') ?>
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-building') ?>

                            <div class="d-xl-flex d-none">
                                <?php get_template_part('template-parts/01_atoms/filters/a-filter-button') ?>
                            </div>
                        </div>

                        <div class="section__search-bar__checkbox-filters">
                            <?php set_query_var('first_option', __('Balcony', 'waterside')); ?>
                            <?php set_query_var('second_option', __('Terrace', 'waterside')); ?>
                            <?php set_query_var('text_divider', true); ?>
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-checkbox-group'); ?>

                            <?php set_query_var('first_option', __('Inner garden', 'waterside')); ?>
                            <?php set_query_var('second_option', __('Street', 'waterside')); ?>
                            <?php set_query_var('text_divider', true); ?>
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-checkbox-group'); ?>

                            <?php set_query_var('first_option', __('Parking', 'waterside')); ?>
                            <?php set_query_var('second_option', __('Storage', 'waterside')); ?>
                            <?php set_query_var('text_divider', false); ?>
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-checkbox-group'); ?>
                        </div>

                        <div class="d-xl-none d-flex justify-content-center">
                            <?php get_template_part('template-parts/01_atoms/filters/a-filter-button') ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section__search-details">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="available-apartments">
                    <span class="js-available-apartments"><?php echo $found_posts; ?></span>
                    <?php _e('available apartments'); ?>
                </h4>

                <?php if ($default_params) : ?>
                    <p class="primary-filter-parameters">
                        <?php foreach ($default_params as $dp) : ?>
                            <?php echo $dp . ', '; ?>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

                <div class="secondary-filter-parameters">
                    <?php if ($labeled_params) : ?>
                        <?php foreach ($labeled_params as $lp) : ?>
                            <div class="badge">
                                <p><?php echo $lp; ?></p>
                                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-x.svg" class="js-delete-badge">
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>


                    <?php if ($params) : ?>
                        <div class="delete-filter js-delete-filters">
                            <p><?php _e('delete filter', 'waterside'); ?></p>
                            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-bin-blue.svg" alt="">
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>