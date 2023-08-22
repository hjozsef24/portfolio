<?php $categories = get_terms('locations-category', array('hide_empty' => true)); ?>
<div class="map-filter__wrapper">
    <div class="js-filter-category filter-category is-selected" data-id="all">
        <p><?php _e('All', 'waterside') ?></p>
    </div>

    <?php foreach ($categories as $category) : ?>
        <?php $category_id = $category->term_id; ?>
        <?php $category_name = $category->name; ?>
        <?php $category_icon = get_field('icon', 'locations-category_'.$category_id); ?>

        <div class="js-filter-category filter-category" data-id="<?php echo $category_id; ?>">
            <img src="<?php echo $category_icon; ?>" class="ofi-contain-center-center">
            <p><?php echo $category_name; ?></p>
        </div>
    <?php endforeach; ?>
</div>