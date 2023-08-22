<?php $apartments_archive_url = get_post_type_archive_link('apartments-cpt'); ?>
<section class="section__pre-search">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-6 col-xl-4 col-12">
                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/demo-animated-logo.svg" alt="" class="animated-svg">
            </div>
            <div class="col-xxl-6 col-xl-8 col-12">
                <form class="pre-search__form-wrapper" action="<?php echo $apartments_archive_url; ?>">
                    <div>
                        <?php get_template_part('template-parts/01_atoms/filters/a-filter-area'); ?>
                        <?php get_template_part('template-parts/01_atoms/filters/a-filter-floor'); ?>
                    </div>

                    <div>
                        <?php get_template_part('template-parts/01_atoms/filters/a-filter-rooms'); ?>
                        <?php get_template_part('template-parts/01_atoms/filters/a-filter-building'); ?>
                    </div>
                    <?php get_template_part('template-parts/01_atoms/filters/a-filter-button'); ?>
                </form>
            </div>
        </div>
</section>