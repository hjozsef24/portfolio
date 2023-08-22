<?php $two_dimension_blueprint = get_field('two_dimension_blueprint', $id); ?>
<?php $three_dimension_blueprint = get_field('three_dimension_blueprint', $id); ?>

<div class="image-switcher__wrapper">
    <div class="image-switcher">
        <?php if ($three_dimension_blueprint) : ?>
            <img src="<?php echo $three_dimension_blueprint['url']; ?>" alt="<?php echo get_image_alt($three_dimension_blueprint); ?>" class="ofi-contain-center-center js-image-to-switch image-to-switch">
        <?php endif; ?>

        <?php if ($two_dimension_blueprint) : ?>
            <img src="<?php echo $two_dimension_blueprint['url']; ?>" alt="<?php echo get_image_alt($two_dimension_blueprint); ?>" class="ofi-contain-center-center js-image-to-switch image-to-switch">
        <?php endif; ?>
    </div>

    <?php if ($three_dimension_blueprint && $two_dimension_blueprint) : ?>
        <div class="js-image-toggle image-toggle">
            <p>3D</p>
            <p>2D</p>
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-dimension-switcher.svg" alt="" class="icon-switcher-icon js-switcher-icon">
        </div>
    <?php endif; ?>
</div>