<?php $hero_image = get_sub_field('hero_image'); ?>
<?php $hero_background_overlay = get_sub_field('hero_background_overlay'); ?>
<?php $hero_text = get_sub_field('hero_text'); ?>

<section class="section__simple-hero <?php echo $hero_background_overlay ?: 'section__simple-hero--overlay' ?>">
    <?php if ($hero_image) : ?>
        <img src="<?php echo $hero_image['url']; ?>" alt="<?php echo get_image_alt($hero_image); ?>" class="ofi-cover-center-center simple-hero__background">
    <?php endif; ?>
    <div class="container-fluid h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xxl-6 col-md-8 my-auto">
                <div class="simple-hero__content">
                    <?php echo $hero_text; ?>
                </div>
            </div>
        </div>
    </div>
</section>