<?php get_header(); ?>

<?php $id = get_the_ID(); ?>
<?php $title = get_the_title(); ?>
<?php $ages = get_field('age'); ?>
<?php $types = get_field('type'); ?>
<?php $hero_image = get_field('hero'); ?>
<?php $thumbnail = get_field('thumbnail'); ?>
<?php $exact_time = get_field('exact_time'); ?>
<?php $related_programs = get_field('related_programs'); ?>

<?php set_query_var('id', $id); ?>
<?php set_query_var('ages', $ages); ?>
<?php set_query_var('types', $types); ?>
<?php set_query_var('hero_text', $title); ?>
<?php set_query_var('is_program_hero', true); ?>
<?php set_query_var('is_overlay_active', true); ?>
<?php set_query_var('hero_image', $hero_image); ?>
<?php get_template_part('template-parts/03_organisms/o-hero') ?>

<?php $all_dates = get_terms('programs-category-dates', array('hide_empty' => true)); ?>

<?php $price = get_field('price'); ?>
<?php $is_free = get_field('is_free'); ?>
<?php $description = get_field('description'); ?>

<?php $programs_template_link = get_template_link('template-programs.php'); ?>
<?php $social_media_items = get_field('single_programs_social_media', 'options'); ?>

<?php $place = get_field('place'); ?>
<?php $place = $place->name; ?>

<?php $dates = get_field('date'); ?>

<?php $program_times =  get_program_times($dates, $exact_time); ?>

<section class="single-program">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12 custom-container-spacing">
                <div class="single-program--header__wrapper d-lg-flex d-none">
                    <div class="taxonomy__wrapper">
                        <?php if ($types) : ?>
                            <?php foreach ($types as $type) : ?>
                                <?php $type_name = $type->name; ?>
                                <?php $type_icon = get_field('filter_icon', 'programs-category-types_' . $type->term_id); ?>
                                <div class="badge">
                                    <?php if ($type_icon) : ?>
                                        <img src="<?php echo $type_icon; ?>" alt="">
                                    <?php endif; ?>
                                    <p><?php echo $type_name; ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ($ages) : ?>
                            <?php foreach ($ages as $age) : ?>
                                <?php $age_name = $age->name; ?>
                                <?php $age_icon = get_field('filter_icon', 'programs-category-ages_' . $age->term_id); ?>
                                <div class="badge">
                                    <?php if ($age_icon) : ?>
                                        <img src="<?php echo $age_icon; ?>" alt="">
                                    <?php endif; ?>
                                    <p><?php echo $age_name; ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if ($is_free) : ?>
                            <div class="badge">
                                <img src="<?php echo ASSETS_URI_IMG; ?>/decor/free-pig.svg" alt="">
                                <p><?php _e('Fizetős', 'gyereksziget'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="icons__wrapper">
                        <?php if ($social_media_items) : ?>
                            <div class="social-media">
                                <?php foreach ($social_media_items as $social_media_item) : ?>
                                    <?php $icon = $social_media_item['icon']; ?>
                                    <?php $link = $social_media_item['link']; ?>

                                    <a href="<?php echo $link; ?>">
                                        <img src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                                    </a>
                                <?php endforeach; ?>

                                <img data-id="<?php echo $id; ?>" class="js-toggle-favourite-program toggle-favourite-program large" src="<?php echo ASSETS_URI_IMG_SVG; ?>/single-programs-favourite.svg" alt="Like icon">
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

                <?php set_query_var('place', $place); ?>
                <?php set_query_var('price', $price); ?>
                <?php set_query_var('image', $thumbnail); ?>
                <?php set_query_var('is_free', $is_free); ?>
                <?php set_query_var('description', $description); ?>
                <?php set_query_var('program_times', $program_times); ?>
                <?php get_template_part('template-parts/03_organisms/o-card-single-program-info-card'); ?>

                
            </div>
        </div>

        <div class="row justify-lg-content-center">
            <div class="offset-lg-2 col-lg-6 col-md-10 col-12">
                <a class="go-to-programs" href="<?php echo $programs_template_link; ?>">
                    <?php _e('Vissza a programokhoz', 'gyereksziget') ?>
                </a>
            </div>
        </div>
    </div>

    <?php if ($related_programs) : ?>
        <div class="container-fluid related-programs">
            <div class="row">
                <div class="col-12">
                    <h2 class="related-programs--title"><?php _e('Hasonló programok', 'gyereksziget'); ?></h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="js-related-programs-slider related-programs-slider">
                        <?php foreach ($related_programs as $id) : ?>
                            <?php get_program_card($id); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>

<?php get_footer(); ?>