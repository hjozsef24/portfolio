<?php $developments = get_posts(array('numberposts' => -1, 'post_type' => 'developments-cpt')); ?>
<?php $developments_archive_url = get_post_type_archive_link('developments-cpt'); ?>
<?php $completions = []; ?>

<?php foreach ($developments as $development) : ?>
    <?php $id = $development->ID; ?>
    <?php $city_region = get_field('location_region', $id); ?>
    <?php $completion_date = get_field('completion_date', $id); ?>


    <?php if ($completion_date) : ?>
        <?php $completions[] = $completion_date; ?>
    <?php endif; ?>

    <?php if ($city_region) : ?>
        <?php $city_regions[] = $city_region; ?>
    <?php endif; ?>
<?php endforeach; ?>

<?php $completions = $completions ? array_unique($completions) : false; ?>
<?php $city_regions = $city_regions ? array_unique($city_regions) : false; ?>

<section>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-12">
                <div class="filter--developments filter-modal js-filter-modal">
                    <div class="filter-modal--header">
                        <p><?php _e('Filtering', 'ua'); ?></p>
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-close.svg" alt="" class="js-toggle-filter-modal">
                    </div>
                    <form method="GET" class="filter-form" action="<?php echo htmlentities($developments_archive_url); ?>">
                        <?php set_query_var('city_region', $city_regions); ?>
                        <?php set_query_var('completions', $completions); ?>
                        <?php set_query_var('bedrooms', true); ?>
                        <?php set_query_var('price', true); ?>
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