<?php $decor = get_sub_field('decor'); ?>
<?php $text = get_sub_field('text'); ?>

<section class="section__text-with-decor">
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <?php if ($decor) : ?>
                    <img src="<?php echo $decor['url']; ?>" alt="<?php echo get_image_alt($decor); ?>" class="section__text-with-decor__image ofi-contain-center-center">
                <?php endif; ?>
            </div>
            <div class="offset-1 col-4 my-auto">
                <?php if ($text) : ?>
                    <?php echo $text; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>