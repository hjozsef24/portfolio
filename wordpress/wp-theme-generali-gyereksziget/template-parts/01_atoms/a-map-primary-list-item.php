<?php $taxonomy = 'programs-category-places'; ?>
<?php $place_id = $place->term_id; ?>
<?php $map_id = get_field('map_id', $taxonomy . '_' . $place_id); ?>
<?php $place_url = get_term_link($place, $taxonomy); ?>
<?php $place_name = get_term($place_id)->name; ?>

<div class="js-map-list-item map--list-item" data-id="<?php echo $map_id; ?>">
    <div class="name__wrapper">
        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/pin.svg" alt="">
        <p class="js-place-name place-name"><?php echo $place_name; ?></p>
    </div>
    <a class="go-to-places" href="<?php echo $place_url; ?>#programok"><?php _e('Programok', 'gyereksziget'); ?></a>
</div>