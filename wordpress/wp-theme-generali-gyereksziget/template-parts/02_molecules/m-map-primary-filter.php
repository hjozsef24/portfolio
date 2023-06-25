<div class="js-toggle-primary-filter close-primary-map-filter"></div>
<div class="map--search__wrapper">
    <form>
        <div class="form-group">
            <input class="js-live-search live-search" type="search" name="search" placeholder="<?php _e('Keresés névre'); ?>">
        </div>
    </form>
    <img class="js-toggle-primary-filter toggle-primary-map-filter" src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-open-close-white.svg" alt="">
</div>

<div class="map--list-item__wrapper">
    <?php foreach ($places as $place) : ?>
        <?php set_query_var('place', $place); ?>
        <?php get_template_part('template-parts/01_atoms/a-map-primary-list-item'); ?>
    <?php endforeach; ?>
</div>