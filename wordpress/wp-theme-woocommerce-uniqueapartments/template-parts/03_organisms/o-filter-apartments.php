<?php $projects = get_terms('pa_project'); ?>
<?php $completions = get_terms('pa_year-of-completion'); ?>
<?php $floors = get_terms('pa_floor'); ?>
<?php $apartments_category_url = get_term_link('apartments', 'product_cat');  ?>

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-12">
                <div class="filter--apartments filter-modal js-filter-modal">
                    <div class="filter-modal--header">
                        <p><?php _e('Filtering', 'ua'); ?></p>
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-close.svg" alt="" class="js-toggle-filter-modal">
                    </div>
                    <form method="GET" class="filter-form" action="<?php echo htmlentities($apartments_category_url); ?>">
                        <?php set_query_var('furniture_package_id', $furniture_package_id); ?>
                        <?php set_query_var('projects', $projects); ?>
                        <?php set_query_var('completions', $completions); ?>
                        <?php set_query_var('floors', $floors); ?>
                        <?php set_query_var('bedrooms', true); ?>
                        <?php set_query_var('size', true); ?>
                        <?php set_query_var('price', true); ?>
                        <?php set_query_var('garden', true); ?>
                        <?php set_query_var('balcony', true); ?>
                        <?php set_query_var('filter_action', 'filter_apartments'); ?>
                        <?php get_template_part('template-parts/02_molecules/m-filter-filters'); ?>
                    </form>
                    <div class="d-md-block d-none">
                        <?php set_query_var('counted_results', $counted_results); ?>
                        <?php get_template_part('template-parts/01_atoms/filters/a-filter-counter'); ?>
                    </div>
                </div>
                <div class="d-md-none d-flex justify-content-between align-items-center">
                    <?php set_query_var('counted_results', $counted_results); ?>
                    <?php get_template_part('template-parts/01_atoms/filters/a-filter-counter'); ?>

                    <?php get_template_part('template-parts/01_atoms/filters/a-filter-toggle-button'); ?>
                </div>

                <div class="d-md-none d-flex justify-content-between align-items-center">
                    <?php get_template_part('template-parts/01_atoms/filters/a-reset-filters'); ?>
                </div>
            </div>
        </div>
    </div>
</section>