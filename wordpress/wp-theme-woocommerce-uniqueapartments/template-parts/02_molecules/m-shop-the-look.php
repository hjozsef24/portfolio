<?php $categories = get_the_terms($id, 'shop-the-look-category'); ?>
<?php $category_ids = wp_list_pluck($categories, 'term_id'); ?>
<?php $category_ids = htmlspecialchars(json_encode((array) $category_ids), ENT_QUOTES, 'UTF-8'); ?>
<?php $permalink = get_the_permalink($id); ?>
<?php $stl_button = get_field('stl_button', $id); ?>
<?php $stl_button_position = get_field('stl_button_position', $id); ?>

<div class="shop-the-look-item js-shop-the-look-item" data-categories=<?php echo $category_ids; ?>>
    <?php echo do_shortcode('[devvn_ihotspot id="' . $id . '"]'); ?>

    <?php if ($stl_button) : ?>
        <a href="<?php echo $stl_button['url']; ?>" class="btn btn--secondary btn--shop-the-look <?php echo $stl_button_position; ?>"><?php echo $stl_button['title']; ?></a>
    <?php endif; ?>
</div>