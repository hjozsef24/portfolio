<?php $title = get_the_title($id); ?>
<?php $permalink = get_the_permalink($id); ?>
<?php $apartment_data  = get_apartment_data($id); ?>
<?php $gross_area = $apartment_data['flat_area_living']; ?>
<?php $balcony_area = $apartment_data['flat_area_balcony']; ?>
<?php $facing = $apartment_data['flat_orientation']; ?>
<?php $building = $apartment_data['building']; ?>
<?php $floor = $apartment_data['floor']; ?>
<?php $two_dimension_blueprint = get_field('two_dimension_blueprint', $id); ?>
<?php $three_dimension_blueprint = get_field('three_dimension_blueprint', $id); ?>
<?php $image = $two_dimension_blueprint ? $two_dimension_blueprint : $three_dimension_blueprint; ?>

<a class="apartment-list-card" href="<?php echo $permalink; ?>">
    <div class="apartment-list-card__left">
        <?php if ($image) : ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="apartment-list-card__image ofi-cover-center-center">
        <?php endif;  ?>

        <div>
            <h6 class="apartment-list-card__title"><?php echo $title; ?></h6>

            <div class="apartment-list-card__attributes__wrapper">
                <?php if ($rooms) : ?>
                    <?php $rooms = $rooms > 1 ? $rooms . ' ' .  __('rooms', 'waterside') : $rooms . ' ' .  __('room', 'waterside'); ?>
                    <p class="apartment-list-card__attribute"><?php echo $rooms; ?></p>
                <?php endif; ?>

                <?php if ($floor) : ?>
                    <p class="apartment-list-card__attribute"><?php echo $floor . '.' . __('floor', 'waterside'); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="apartment-list-card__right">
        <?php if ($building) : ?>
            <h6 class="apartment-list-card__title"><?php echo $building; ?></h6>
        <?php endif; ?>

        <div class="apartment-list-card__attributes__wrapper">
            <?php if ($gross_area) : ?>
                <p class="apartment-list-card__attribute"><?php echo $gross_area; ?> m²</p>
            <?php endif; ?>

            <?php if ($balcony_area) : ?>
                <p class="apartment-list-card__attribute"><?php echo $balcony_area; ?> m² <?php _e('balcony', 'waterside'); ?></p>
            <?php endif; ?>

            <?php if ($facing) : ?>
                <p class="apartment-list-card__attribute"><?php echo $facing; ?></p>
            <?php endif; ?>
        </div>
        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-heart.svg" class="apartment-list-card__wishlist">
    </div>
</a>