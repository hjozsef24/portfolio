<?php
$app_promotion = get_sub_field('app_promotion');

if (!$app_promotion) {
    return;
}

$app_promotion_id = $app_promotion[0];
$instagram_layout = get_field('instagram_layout', $app_promotion_id);
$section_main_title = get_field('section_main_title', $app_promotion_id);
$divider_is_hidden = get_field('divider_is_hidden', $app_promotion_id);
$margin_top_is_minus = get_field('margin_is_minus', $app_promotion_id);
$extra_margin_bottom = get_field('extra_margin_bottom', $app_promotion_id);
$image = get_field('image', $app_promotion_id);
//$image = !$instagram_layout ? $image : '';
$responsive_section_title = get_field('responsive_section_title', $app_promotion_id);
$image_is_aligned_right = get_field('image_is_aligned_right', $app_promotion_id);
$flexible_content_app_promotion = get_field('flexible_content_app_promotion', $app_promotion_id);

$section_extra_classes = '';
$section_extra_classes .= $instagram_layout ? ' instagram-layout ' : '';
$section_extra_classes .= $extra_margin_bottom ? ' extra-margin-bottom ' : '';
$section_extra_classes .= $margin_top_is_minus ? ' minus-margin-top ' : '';
$section_extra_classes .= $image_is_aligned_right ? ' image-is-aligned-right ' : '';
?>

<section class="section__app-promotion <?= $section_extra_classes; ?>">

    <?php if ($instagram_layout) : ?>
        <img src="<?= asset('circle-grey.svg', '', 'images/decors') ?>" alt="" class="instagram__decor">
    <?php endif; ?>

    <?php if (!$instagram_layout) : ?>
        <div class="d-md-none d-block">
            <?php if ($section_main_title) : ?>
                <h1 class="app-promotion__title"><?= $section_main_title; ?></h1>
            <?php endif; ?>

            <?php if ($responsive_section_title) : ?>
                <h2 class="responsive-section-title"><?= $responsive_section_title; ?></h2>
            <?php endif; ?>

            <?php if ($image) : ?>
                <div class="image__wrapper <?= $image_is_aligned_right ? 'order-xl-2' : 'order-1'; ?>">
                    <img src="<?= $image['url']; ?>" alt="<?= get_image_alt($image); ?>" class="app-promotion__image ofi-contain-center-center">
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="container-fluid <?= $instagram_layout ? 'ps-xl-0' : '' ?>">
        <div class="row justify-content-center">
            <div class="<?= $instagram_layout ? 'col-12' : 'col-xxl-10 col-12' ?>">
                <?php if ($section_main_title) : ?>
                    <h1 class="d-md-block d-none app-promotion__title"><?= $section_main_title; ?></h1>
                <?php endif; ?>

                <div class="app-promotion__inner <?= !$divider_is_hidden ? 'has-divider' : ''; ?>">

                    <?php if ($responsive_section_title) : ?>
                        <h2 class="d-md-block d-xl-none d-none responsive-section-title"><?= $responsive_section_title; ?></h2>
                    <?php endif; ?>

                    <?php if ($image) : ?>
                        <div class="<?= !$instagram_layout ? 'd-md-block d-none' : ''; ?> image__wrapper <?= $image_is_aligned_right ? 'order-xl-2' : 'order-1'; ?>">
                            <img src="<?= $image['url']; ?>" alt="<?= get_image_alt($image); ?>" class="app-promotion__image ofi-contain-center-center">
                        </div>
                    <?php endif; ?>

                    <div class="flexible-content__wrapper <?= $image_is_aligned_right ? 'order-xl-1' : 'order-2'; ?>">
                        <?php
                        if ($flexible_content_app_promotion) {
                            get_flexible_content('flexible_content_app_promotion', $app_promotion_id, 'template-parts/02_molecules/app-promotion/m');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>