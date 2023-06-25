<?php
if (get_sub_field('hero_text')) {
    $hero_text = get_sub_field('hero_text');
}

if (get_sub_field('hero_image')) {
    $hero_image = get_sub_field('hero_image');
}

if (get_sub_field('is_overlay_active')) {
    $is_overlay_active = get_sub_field('is_overlay_active');
}
?>
<section class="hero">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <img class="hero__img" src="<?php echo $hero_image['url'] ?>" alt="<?php echo get_image_alt($hero_image); ?>" srcset="">
                <?php if ($is_overlay_active) : ?>
                    <div class="hero__img-overlay"></div>
                <?php endif; ?>
                <div class="hero__text">
                    <?php echo $hero_text; ?>
                </div>

                <?php if ($is_program_hero) : ?>
                    <div class="single-program--header__wrapper d-lg-none d-block">
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

                        <img data-id="<?php echo $id; ?>" class="js-toggle-favourite-program toggle-favourite-program large" src="<?php echo ASSETS_URI_IMG_SVG; ?>/single-programs-favourite.svg" alt="Like icon">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>