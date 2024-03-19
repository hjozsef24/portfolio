<?php
$heros = get_sub_field('heros');
$decor_is_hidden = get_sub_field('decor_is_hidden');

if (!$heros) {
    return;
}
?>

<section class="section__hero">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12 px-0">
                <?php get_template_part('template-parts/02_molecules/hero/m-hero-slider', '', compact('heros')); ?>
                <?php get_template_part('template-parts/02_molecules/hero/m-hero-assets', '', compact('decor_is_hidden')); ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.heroSlider();'); ?>