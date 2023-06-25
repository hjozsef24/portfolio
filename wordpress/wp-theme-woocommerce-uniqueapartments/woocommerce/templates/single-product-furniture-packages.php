<?php get_header(); ?>

<?php $id = get_the_ID(); ?>
<?php $title = get_the_title(); ?>
<?php $product = wc_get_product($id); ?>
<?php $price = $product->get_price_html(); ?>
<?php $description = $product->post->post_content; ?>
<?php $products_in_group = $product->get_cross_sell_ids(); ?>
<?php $references = get_field('references', $id); ?>

<main class="product-template product-template--furniture-package">
    <section>
        <div class="container-fluid px-0 d-md-none d-block">
            <div class="row">
                <div class="col-12">
                    <?php get_template_part('woocommerce/template-parts/product-image'); ?>
                </div>
            </div>
        </div>
        <div class="container-fluid custom-tablet-spacing">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-6 col-12 d-md-block d-none custom-tablet-spacing">
                    <?php get_template_part('woocommerce/template-parts/product-image'); ?>
                </div>

                <div class="col-xxl-3 col-xl-5 col-12 extra-tablet-spacing">
                    <h3 class="product-title responsive-32"><?php echo $title; ?></h3>

                    <?php if ($description) : ?>
                        <p class="product-description"><?php echo $description; ?></p>
                    <?php endif; ?>

                    <div class="price__wrapper">
                        <p><?php _e('Price: ') ?></p>
                        <h4><?php echo $price; ?></h4>
                    </div>


                    <?php set_query_var('post_id', $post_id); ?>
                    <?php get_template_part('template-parts/03_organisms/o-add-to-wishlist'); ?>

                    <?php set_query_var('product_id', $id); ?>
                    <?php get_template_part('woocommerce/template-parts/add-to-cart-button-single-products'); ?>

                </div>
            </div>
        </div>
    </section>

    <?php if ($products_in_group) : ?>
        <div class="container-fluid container-spacing individual-products">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-12">
                    <div class="divider"></div>
                    <h3 class="mb-32 responsive-40"><?php _e('Products in package', 'ua'); ?></h3>
                </div>
                <div class="row px-0">
                    <div class="offset-xl-2 col-xl-6 col-12">
                        <div class="row js-products-in-package-slider products-in-package-slider">
                            <?php foreach ($products_in_group as $product_id) : ?>
                                <div class="col-md-6 col-12">
                                    <?php get_individual_product_card($product_id, false); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <?php endif; ?>

    <?php if ($references) : ?>
        <div class="container-fluid similar-products">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-12">
                    <div class="divider"></div>
                    <h3 class="mb-32 responsive-32"><?php _e('References', 'ua'); ?></h3>
                    <div class="row js-products-in-package-slider references-slider">
                        <?php foreach ($references as $reference) : ?>
                            <div class="col-xl-4 col-6">
                                <?php get_references_card($reference); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</main>

<?php get_footer(); ?>