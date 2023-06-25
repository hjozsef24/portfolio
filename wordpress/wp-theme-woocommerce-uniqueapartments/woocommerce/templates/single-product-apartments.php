<?php get_header(); ?>

<?php $id = get_the_ID(); ?>
<?php $product = wc_get_product($id); ?>
<?php $gallery = $product->get_gallery_image_ids(); ?>

<main class="product-template product-template--apartments">
    <?php get_template_part('woocommerce/template-parts/product-image'); ?>

    <?php set_query_var('id', $id); ?>
    <?php get_template_part('template-parts/03_organisms/o-apartments-product-details'); ?>

    <?php if ($gallery) : ?>
        <?php set_query_var('gallery', $gallery); ?>
        <?php get_template_part('template-parts/03_organisms/o-apartments-gallery'); ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>