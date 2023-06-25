<?php /* Template name: Sablon: Térkép oldal */ ?>
<?php get_header(); ?>
<?php $ages = get_terms('programs-category-ages', array('hide_empty' => true)); ?>
<?php $types = get_terms('programs-category-types', array('hide_empty' => true)); ?>

<section class="map">
    <div class="button-container">
        <div class="js-map-zoom-button map-zoom-button" id="zoomIn">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/zoom-in.svg" alt="Zoom In">
        </div>
        <div class="js-map-zoom-button map-zoom-button" id="zoomOut">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/zoom-out.svg" alt="Zoom In">
        </div>
    </div>
    <?php get_template_part('template-parts/03_organisms/o-map'); ?>

    <?php get_template_part('template-parts/03_organisms/o-map-primary-filter'); ?>
    <div class="d-sm-block d-none">
        <?php get_template_part('template-parts/03_organisms/o-map-secondary-filter'); ?>
    </div>

    <div class="d-sm-none justify-content-center d-flex map--mobile-filters-button__wrapper">
        <?php set_query_var('ages', $ages); ?>
        <?php set_query_var('types', $types); ?>
        <?php set_query_var('extra_button', true); ?>
        <?php get_template_part('template-parts/02_molecules/m-program-filter-modal'); ?>        
    </div>
</section>

<?php get_footer(); ?>