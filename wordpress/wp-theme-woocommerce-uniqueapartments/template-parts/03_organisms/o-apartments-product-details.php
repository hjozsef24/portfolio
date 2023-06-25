<?php $title = get_the_title(); ?>
<?php $product = wc_get_product($id); ?>
<?php $price = $product->get_price_html(); ?>
<?php $attributes = $product->get_attributes(); ?>
<?php $description = $product->get_description(); ?>
<?php $additional_information = get_field('additional_information'); ?>
<?php $furniture_packages_url = get_term_link('furniture-packages', 'product_cat'); ?>

<section class="apartments-product-details">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-4 col-xl-6 col-lg-12">
                <h2 class="responsive-32"><?php echo $title; ?></h2>

                <?php $attributes_list = get_post_meta($id, '_product_attributes', false); ?>
                <?php if ($attributes_list) : ?>
                    <?php set_query_var('product', $product); ?>
                    <?php set_query_var('attributes', $attributes); ?>
                    <?php get_template_part('woocommerce/template-parts/product-attributes-with-icons') ?>
                <?php endif; ?>

                <div class="product-description">
                    <?php echo $description; ?>
                </div>

            </div>
            <div class="offset-xxl-1 col-xxl-3 col-xl-4 col-lg-12">
                <div class="price__wrapper">
                    <p><?php _e('Price: ') ?></p>
                    <h4><?php echo $price; ?></h4>
                </div>

                <?php set_query_var('id', $post_id); ?>
                <?php get_template_part('template-parts/03_organisms/o-add-to-wishlist'); ?>

                <?php set_query_var('product_id', $id); ?>
                <?php get_template_part('woocommerce/template-parts/add-to-cart-button-single-products'); ?>

                <a class="btn btn--secondary" href="<?php echo add_query_arg('apartment_id', $id, $furniture_packages_url); ?>">
                    <?php _e('Show furniture packages', 'ua'); ?>
                </a>

                <?php if ($additional_information) : ?>
                    <?php set_query_var('additional_information', $additional_information); ?>
                    <?php get_template_part('template-parts/02_molecules/m-additional-information')?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>