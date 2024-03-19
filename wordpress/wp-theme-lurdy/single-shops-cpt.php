<?php
get_header();
$post_id = get_the_ID();
$post_type = get_post_type();
$title = get_the_title();
$category = get_field('shop_taxonomy') ?? false;
$accepted_coupons = get_field('accepted_coupons') ?? false;
$payment_methods = get_field('payment_methods') ?? false;
$highlighted_image = get_field('highlighted_image') ?? false;
$opening_times = get_field('opening_times') ?? false;
$phone_numbers = get_field('phone_numbers') ?? false;
$websites = get_field('websites') ?? false;
$email_addresses = get_field('email_addresses') ?? false;
$map_button = get_field('map_button') ?? false;
$shop_description = get_field('shop_description') ?? false;
$shops_archive_url = get_post_type_archive_link('shops-cpt');
$back_to_link_title = __('Vissza az üzletekhez', 'lurdy');

$information_table_args = compact(
    'post_type',
    'websites',
    'opening_times',
    'phone_numbers',
    'email_addresses',
    'accepted_coupons',
    'payment_methods'
);

$back_to_link_args = [
    'url' => $shops_archive_url,
    'title' => $back_to_link_title
];
?>

<main class="single single--shops-cpt">

    <div class="d-xl-none d-block section_back-to-link--top">
        <?php get_template_part('template-parts/03_organisms/o-back-to-link', '', $back_to_link_args); ?>
    </div>

    <div class="sections__wrapper">
        <section class="section__shop__deatils">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-12 order-xl-1 order-2">
                        <?php generate_breadcrumb(true); ?>

                        <h2 class="shop-details__title"><?= $title; ?></h2>

                        <?php if ($category) : ?>
                            <p class="shop__deatils__category"><?= $category->name; ?></p>
                        <?php endif; ?>

                        <div class="shop-details__informations">
                            <?php get_template_part('template-parts/02_molecules/m-information-table', '', $information_table_args); ?>
                        </div>

                        <?php if ($map_button) : ?>
                            <a href="<?= $map_button['url']; ?>" class="btn btn--secondary"><?= $map_button['title']; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-6 col-12 order-xl-2 order-1">
                        <?php if ($highlighted_image) : ?>
                            <div class="shop__details__image">
                                <img fancybox src="<?= $highlighted_image['url']; ?>" alt="<?= get_image_alt($highlighted_image); ?>" class="ofi-cover-center-center">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <?php if ($shop_description) : ?>
            <section class="section__shop__description">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-12">
                            <?= $shop_description; ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </div>
    <?php get_flexible_content(); ?>
</main>

<?php get_footer(); ?>