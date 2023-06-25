<?php $highlighted_places_text = get_sub_field('highlighted_places_text'); ?>
<?php $highlighted_places = get_sub_field('highlighted_places'); ?>
<?php $highlighted_places_button = get_sub_field('highlighted_places_button'); ?>

<section class="highlighted-places">
    <div class="container-fluid">
        <?php if ($highlighted_places_text) : ?>
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-12">
                    <div class="highlighted-programs--text__wrapper">
                        <?php echo $highlighted_places_text; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($highlighted_places) : ?>
            <div class="row justify-content-center js-highlighted-places-slider highlighted-places-slider">
                <?php foreach ($highlighted_places as $id) : ?>
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                        <?php get_places_card($id, 'programs-category-places'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($highlighted_places_button) : ?>
            <div class="row">
                <div class="col-12">
                    <a href="<?php echo $highlighted_places_button['url']; ?>" class="btn btn--centered"><?php echo $highlighted_places_button['title']; ?></a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>