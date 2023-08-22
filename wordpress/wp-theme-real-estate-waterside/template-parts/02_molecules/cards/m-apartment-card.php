<?php $title = get_the_title($id); ?>
<?php $permalink = get_the_permalink($id); ?>
<?php $gallery = get_field('gallery', $id); ?>
<?php $attributes = get_apartment_data($id); ?>
<?php $gross_area = $attributes['flat_area']; ?>
<?php $price = $attributes['flat_price']; ?>
<?php $currency = $attributes['currency']; ?>
<?php $excerpt = get_field('excerpt_on_card', $id); ?>
<?php $excerpt = wp_trim_words($excerpt, 12, '...'); ?>

<div class="apartments-card__wrapper">
    <?php if ($gallery) : ?>
        <div class="apartment-card__header">
            <div class="js-apartment-card-gallery-<?php echo $id; ?> apartment-card-gallery">
                <?php foreach ($gallery as $i => $image) : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="ofi-cover-center-center" data-fancybox="gallery_<?php echo $id; ?>" data-src="<?php echo $image['url']; ?>">
                <?php endforeach; ?>
            </div>

            <button type="button" class="btn btn--arrow btn--lighter-blue js-apartment-gallery-prev apartment-gallery-prev">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt="">
            </button>


            <button type="button" class="btn btn--arrow btn--lighter-blue js-apartment-gallery-next apartment-gallery-next">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt="">
            </button>

            <div class="apartment-card__badge__container">
                <div class="apartment-card__badge__wrapper">
                    <p class="badge badge--primary">Lorem</p>
                </div>

                <div class="apartment-card__badge__wrapper">
                    <p class="badge badge--secondary">Sit amet</p>
                    <p class="badge badge--secondary">Dolor</p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="apartment-card__body">
        <a href="<?php echo $permalink; ?>" class="apartment-card__title">
            <?php echo $title; ?>
        </a>

        <?php if ($price) : ?>
            <p class="apartment-card__price"><?php echo $price . ' ' . $currency; ?></p>
        <?php endif; ?>

        <?php if ($excerpt) : ?>
            <p class="apartment-card__description"><?php echo $excerpt; ?></p>
        <?php endif; ?>

        <div class="apartment-card__attributes__wrapper">
            <?php if ($bathrooms) : ?>
                <div class="apartment-card__attribute">
                    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-bathtub.svg" alt="" class="ofi-contain-center-center">
                    <p><?php echo $bathrooms; ?></p>
                </div>
            <?php endif; ?>

            <?php if ($rooms) : ?>
            <div class="apartment-card__attribute">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-bed.svg" alt="" class="ofi-contain-center-center">
                <p><?php echo $rooms; ?></p>
            </div>
            <?php endif; ?>

            <?php if ($gross_area) : ?>
            <div class="apartment-card__attribute">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-cross-arrow.svg" alt="" class="ofi-contain-center-center">
                <p><?php echo $gross_area; ?> m<sup>2</sup></p>
            </div>
            <?php endif; ?>

        </div>
    </div>

    <div class="js-apartment-card-footer apartment-card__footer">
        <div class="p-relative">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-share.svg" alt="" class="js-share cursor-pointer">
        </div>

        <div class="p-relative">
            <img data-id="<?php echo $id; ?>" src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-heart.svg" alt="" class="js-add-to-wishlist cursor-pointer">
        </div>
    </div>

    <?php set_query_var('permalink', $permalink); ?>
    <?php get_template_part('template-parts/01_atoms/a-share-modal'); ?>
</div>