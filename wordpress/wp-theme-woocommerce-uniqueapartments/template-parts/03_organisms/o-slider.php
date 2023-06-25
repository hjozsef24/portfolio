<section class="slider">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <div class="js-slider">
                    <?php foreach ($slider as $slide) : ?>
                        <?php set_query_var('slide', $slide); ?>
                        <?php get_template_part('template-parts/02_molecules/m-slider'); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>