<div class="attribute-icons">
	<?php foreach ($attributes as $attribute) : ?>
		<?php $attr = $attribute['data']['name']; ?>
		<?php $attr_name = wc_attribute_label($attr, $id); ?>
		<?php $attr_value = $product->get_attribute($attr_name); ?>
		<div class="attribute-icons__wrapper">
			<img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-demo.svg" alt="">
			<div  class="col-6 custom-tablet-spacing attribute-details">
				<p class="attribute-name"><?php echo $attr_name; ?></p>
				<p class="attribute-value"><?php echo $attr_value; ?></p>
			</div>
		</div>
	<?php endforeach; ?>
</div>