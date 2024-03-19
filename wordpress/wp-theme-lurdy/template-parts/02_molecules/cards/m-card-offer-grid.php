<?php
$offer_details = $args['offer_details'];

$title = $offer_details['title'];
$permalink = $offer_details['permalink'];
$discount = $offer_details['discount'];
$image = $offer_details['image'];
$related_shop = $offer_details['related_shop'];
$date = $offer_details['date'];
?>

<div class="card__offer-grid">
    <a href="<?= $permalink; ?>" class="card__offer-grid__permalink"></a>

    <?php if ($discount) : ?>
        <?php get_template_part('template-parts/01_atoms/a-discount-badge', '', compact('discount')); ?>
    <?php endif; ?>

    <?php if ($image) : ?>
        <div class="card__offer-grid__image__wrapper">
            <img src="<?= $image['url']; ?>" alt="<?= get_image_alt($image); ?>" class="card__offer-grid__image ofi-cover-center-center">
        </div>
    <?php else : ?>
        <div class="card__offer-grid__image__wrapper">
            <img src="<?= asset('placeholder.png', '', 'images'); ?>" alt="Placeholder" class="card__offer-grid__image ofi-contain-center-center">
        </div>
    <?php endif; ?>

    <div class="card__offer-grid__inner">
        <?php if ($related_shop) : ?>
            <a href="<?= $related_shop['permalink']; ?>"><?= $related_shop['name']; ?></a>
        <?php endif; ?>

        <h4><?= $title; ?></h4>

        <?php if ($date) : ?>
            <p><?= $date; ?></p>
        <?php endif; ?>
    </div>
</div>