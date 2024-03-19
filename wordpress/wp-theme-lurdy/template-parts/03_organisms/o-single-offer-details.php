<?php
$offer = get_sub_field('offer');
$offer_id = $offer[0];
$offer_details = get_offer_details($offer_id);

$title = $offer_details['title'];
$permalink = $offer_details['permalink'];
$discount = $offer_details['discount'];
$description = $offer_details['description'];
$image = $offer_details['image'];
$related_shop = $offer_details['related_shop'];
$date = $offer_details['date'];
$original_price = $offer_details['original_price'];
$discounted_price = $offer_details['discounted_price'];
$map_link = $offer_details['map_link'];
?>

<section class="section__single-offer-details">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-5 col-xl-4 col-md-6 order-md-1 order-2">
                <div class="offer-details__wrapper">
                    <?php if ($discount) : ?>
                        <?php get_template_part('template-parts/01_atoms/a-discount-badge', '', compact('discount')); ?>
                    <?php endif; ?>

                    <div>
                        <h2><?= $title; ?></h2>

                        <?php if ($related_shop) : ?>
                            <a class="offer-details__shop" href="<?= $related_shop['permalink']; ?>"><?= $related_shop['name']; ?></a>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="description__wrapper d-xl-none d-block">
                                <?= $description; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div>
                        <?php if ($original_price) : ?>
                            <s><?= number_format($original_price, 0, ' ', ' ') . ' Ft'; ?></s>
                        <?php endif; ?>

                        <?php if ($discounted_price) : ?>
                            <h5><?= number_format($discounted_price, 0, ' ', ' ') . ' Ft'; ?></h5>
                        <?php endif; ?>
                    </div>

                    <?php if ($date) : ?>
                        <p class="offer-details__date"><?= $date; ?></p>
                    <?php endif; ?>

                    <?php if ($map_link) : ?>
                        <a href="<?= $map_link['url']; ?>" class="btn btn--secondary">
                            <?= $map_link['title']; ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-xl-4 my-auto d-xl-block d-none order-2">
                <?php if ($description) : ?>
                    <div class="description__wrapper">
                        <?= $description; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-xxl-3 col-xl-4 col-md-6 order-md-3 order-1">
                <?php if ($image) : ?>
                    <img data-fancybox src="<?= $image['url']; ?>" alt="<?= get_image_alt($image); ?>" class="offer-details__image ofi-cover-center-center">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.fancyBox();'); ?>