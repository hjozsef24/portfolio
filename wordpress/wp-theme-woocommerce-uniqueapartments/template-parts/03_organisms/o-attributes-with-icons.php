<div class="attribute-icons">
	<?php foreach ($attributes as $attribute) : ?>
		<?php $icon = $attribute['icon']; ?>
		<?php $name = $attribute['name']; ?>
		<?php $value = $attribute['value']; ?>
		<div class="attribute-icons__wrapper">
			<?php if ($icon) : ?>
				<img src="<?php echo $icon['url']; ?>" alt="<?php get_image_alt($icon); ?>">
			<?php endif; ?>

			<div>
				<?php if ($name) : ?>
					<p class="attribute-name"><?php echo $name; ?></p>
				<?php endif; ?>
				
				<?php if ($value) : ?>
					<p class="attribute-value"><?php echo $value; ?></p>
				<?php endif; ?>

			</div>
		</div>
	<?php endforeach; ?>
</div>