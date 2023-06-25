<div class="product-image-gallery">
	<div class="js-product-image-gallery">
		<?php foreach ($gallery as $id) : ?>
			<div class="product-image-gallery--image__wrapper">
				<?php $src = wp_get_attachment_image_src($id, 'full')[0]; ?>
				<?php $default_alt = get_post_meta($id, '_wp_attachment_image_alt', TRUE); ?>
				<?php $title = get_the_title($id); ?>
				<?php $alt = $default_alt != "" ? $default_alt : $title; ?>

				<img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
			</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="product-thumbnail-gallery">
	<div class="js-product-thumbnail-gallery">
		<?php foreach ($gallery as $id) : ?>
			<div class="product-thumbnail-gallery--image__wrapper">
				<?php $src = wp_get_attachment_image_src($id, 'full')[0]; ?>
				<?php $default_alt = get_post_meta($id, '_wp_attachment_image_alt', TRUE); ?>
				<?php $title = get_the_title($id); ?>
				<?php $alt = $default_alt != "" ? $default_alt : $title; ?>

				<img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>">
			</div>
		<?php endforeach; ?>
	</div>
</div>