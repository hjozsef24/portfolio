<?php
$posts_per_page = $args['posts_per_page'] ?? '';
$is_paged = $args['is_paged'] ?? false;
$order_by = $args['order_by'] ?? '';
$order = $args['order'] ?? '';
$is_filtered = $args['is_filtered'] ?? false;
$filter_by_shop_cpt = $args['filter_by_shop_cpt'];
$filter_by_shop_taxonomy = $args['filter_by_shop_taxonomy'];
$filter_by = $args['filter_by'] ?? '';
$relation = $args['relation'] ?? '';
$filter_date = $args['filter_date'] ? $args['filter_date'] : date('Y-m-d H:i:s');

$extra_data = ' data-order_by="' . $order_by . '" ';
$extra_data .= ' data-order="' . $order . '" ';
$extra_data .= ' data-is_paged="' . ($is_paged ? 'true' : 'false') . '" ';
$extra_data .= $is_paged ? ' data-posts_per_page="' . $posts_per_page . '" ' : '';
$extra_data .= ' data-is_filtered="' . ($is_filtered ? 'true' : 'false') . '" ';
$extra_data .= $is_filtered ? ' data-filter_by="' . $filter_by . '" ' : '';
$extra_data .= $is_filtered ? ' data-filter_relation="' . $relation . '" ' : '';
$extra_data .= ($is_filtered && $filter_by_shop_cpt) ? ' data-filter_by_shop_cpt="' . htmlspecialchars(json_encode($filter_by_shop_cpt), ENT_QUOTES, 'UTF-8'). '" ' : '';
$extra_data .= ($is_filtered && $filter_by_shop_taxonomy) ? ' data-filter_by_shop_taxonomies="' . htmlspecialchars(json_encode($filter_by_shop_taxonomy), ENT_QUOTES, 'UTF-8'). '" ' : '';
$extra_data .= $is_filtered ? ' data-filter_date="' . $filter_date . '" ' : '';
?>
<div class="offers-grid__list js-offers-grid <?= !$is_paged ? 'js-offers-grid-slider offers-grid-slider' : ''; ?>" <?= $extra_data; ?>>
    <?php if ($is_paged) : ?>
        <button type="button" class="btn btn--secondary js-load-more-offers load-more-offers">
            <?= __('További ajánlatok betöltése', 'lurdy') ?>
        </button>
    <?php endif; ?>
</div>
<?php addScript('window.loadOffers();'); ?>