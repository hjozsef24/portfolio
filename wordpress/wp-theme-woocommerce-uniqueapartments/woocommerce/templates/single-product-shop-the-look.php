<?php get_header(); ?>

<?php $post_id = get_the_ID(); ?>
<?php $title = get_the_title(); ?>
<?php $product = wc_get_product($post_id); ?>
<?php $gallery = $product->get_gallery_image_ids(); ?>
<?php $attributes = $product->get_attributes(); ?>
<?php $attributes_list = get_post_meta($post_id, '_product_attributes', false); ?>
<?php $description = $product->post->post_content; ?>
<?php $products_in_group = $product->get_cross_sell_ids(); ?>
<?php $products_in_upsells = $product->get_upsell_ids(); ?>

<main class="product-template product-template--shop-the-look">
	<div class="container-fluid container-spacing">
		<div class="row justify-content-center">
			<div class="col-xl-5 col-12">
				<?php if ($gallery) : ?>
					<?php set_query_var('gallery', $gallery); ?>
					<?php get_template_part('woocommerce/template-parts/product-image-gallery'); ?>
				<?php endif; ?>

				<?php if ($attributes_list) : ?>
					<div class="d-xl-block d-none">
						<?php set_query_var('product', $product); ?>
						<?php set_query_var('attributes', $attributes); ?>
						<?php get_template_part('woocommerce/template-parts/product-attributes-with-icons') ?>
					</div>
				<?php endif; ?>
			</div>

			<div class="col-xl-3 col-12">
				<h3 class="product-title responsive-32"><?php echo $title; ?></h3>

				<?php if ($attributes_list) : ?>
					<div class="d-block d-xl-none">
						<?php set_query_var('product', $product); ?>
						<?php set_query_var('attributes', $attributes); ?>
						<?php get_template_part('woocommerce/template-parts/product-attributes-with-icons') ?>
					</div>
				<?php endif; ?>

				<?php if ($description) : ?>
					<p class="product-description"><?php echo $description; ?></p>
				<?php endif; ?>

				<?php get_template_part('woocommerce/template-parts/add-to-cart-button-shop-the-look'); ?>

				<?php set_query_var('post_id', $post_id); ?>
				<?php get_template_part('template-parts/03_organisms/o-add-to-wishlist'); ?>
			</div>
		</div>
	</div>

	<?php if ($products_in_group) : ?>
		<div class="container-fluid container-spacing individual-products">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-12">
					<div class="divider"></div>
					<h3 class="mb-32 responsive-40"><?php _e('Products in this apartment', 'ua'); ?></h3>
					<div class="row js-products-in-group-slider products-in-group-slider">
						<?php foreach ($products_in_group as $product_id) : ?>
							<div class="col-xl-3 col-4">
								<?php get_individual_product_card($product_id); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ($products_in_upsells) : ?>
		<div class="container-fluid container-spacing related-products">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-12">
					<div class="divider"></div>
					<h3 class="mb-32 responsive-40"><?php _e('Related products', 'ua'); ?></h3>
					<div class="row js-upsells-product-slider upsells-product-slider">
						<?php foreach ($products_in_upsells as $upsell_product_id) : ?>
							<div class="col-xl-3 col-4">
								<?php get_shop_the_look_card($upsell_product_id, false); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php $similar_products = get_products_by_type(3, 'date', 'DESC', 'shop-the-look', [$post_id]); ?>
	<?php if ($similar_products->have_posts()) : ?>
		<div class="container-fluid similar-products">
			<div class="row justify-content-center">
				<div class="col-xl-8 col-12">
					<div class="divider"></div>
					<h3 class="mb-32 responsive-40"><?php _e('Similar Projects', 'ua'); ?></h3>
					<div class="row js-similar-product-slider similar-product-slider">
						<?php while ($similar_products->have_posts()) : ?>
							<?php $similar_products->the_post(); ?>
							<div class="col-xl-4 col-6">
								<?php $similar_product_id = get_the_ID(); ?>
								<?php get_similar_shop_the_look_product_card($similar_product_id); ?>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</main>

<?php get_footer(); ?>