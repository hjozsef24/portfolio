<?php $program_dates = get_terms('programs-category-dates', array('hide_empty' => true)); ?>

<section class="gallery">
    <div class="container-fluid custom-container-spacing">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12 custom-container-spacing">
                <?php set_query_var('program_dates', $program_dates); ?>
                <?php get_template_part('template-parts/02_molecules/m-gallery-filter'); ?>
            </div>
        </div>


        <?php foreach ($program_dates as $i => $date) : ?>
            <?php $gallery = get_field('gallery', 'programs-category-dates_' . $date->term_id) ?>
            <div class="row justify-content-center js-gallery-content" data-id="<?php echo $i; ?>">
                <?php if ($gallery) : ?>
                    <?php foreach ($gallery as $key => $image) : ?>
                        <div class="col-xxl-3 col-md-4 col-6">
                            <div class="gallery--image__wrapper">
                                <img class="gallery--image" src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>