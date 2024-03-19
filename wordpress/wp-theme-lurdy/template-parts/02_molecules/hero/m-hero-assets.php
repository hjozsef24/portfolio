<?php $decor_is_hidden = $args['decor_is_hidden']; ?>

<div class="slider__arrows d-md-flex d-none">
    <img src="<?= asset('arrow.svg', '', 'images/icons'); ?>" alt="" class="previus-arrow js-hero-previous-arrow">
    <img src="<?= asset('arrow.svg', '', 'images/icons'); ?>" alt="" class="next-arrow js-hero-next-arrow">
</div>

<?php if (!$decor_is_hidden) : ?>
    <div class="hero__decors__wrapper">
        <img src="<?= asset('circle-blue.svg', '', 'images/decors'); ?>" alt="Decor" class="hero__decor--first js-hero-decor">
        <img src="<?= asset('circle-green.svg', '', 'images/decors'); ?>" alt="Decor" class="hero__decor--second js-hero-decor">
        <img src="<?= asset('circle-grey.svg', '', 'images/decors'); ?>" alt="Decor" class="hero__decor--third js-hero-decor">
    </div>
<?php endif; ?>