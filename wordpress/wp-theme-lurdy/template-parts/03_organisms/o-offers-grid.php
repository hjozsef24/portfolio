<?php
$section_title = get_sub_field('section_title');
$button = get_sub_field('button');
$order_by = get_sub_field('order_by');
$order = get_sub_field('order');
$is_paged = get_sub_field('is_paged');
$is_filtered = get_sub_field('is_filtered');
$filter_by_shop_cpt = get_sub_field('filter_by_shop_cpt');
$filter_by = $is_filtered ? get_sub_field('filter_by') : false;
$relation = $is_filtered ? get_sub_field('relation') : false;
$filter_date = $is_filtered ? get_sub_field('filter_date') : false;
$filter_by_shop_taxonomy = $is_filtered ? get_sub_field('filter_by_shop_taxonomy') : false;
$posts_per_page = get_sub_field('posts_per_page');
$posts_per_page = ($posts_per_page && $is_paged) ? $posts_per_page : 4;

$offers_header_args = compact('section_title', 'button');
$offer_grid_list_args = compact(
    'is_paged', 
    'posts_per_page', 
    'order_by', 
    'order', 
    'filter_by', 
    'relation', 
    'filter_date', 
    'is_filtered',
    'filter_by_shop_cpt',
    'filter_by_shop_taxonomy',
);
?>

<section class="section__offers-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php get_template_part('template-parts/02_molecules/m-section-header', '', $offers_header_args); ?>
                <?php get_template_part('template-parts/02_molecules/m-offers-grid-list', '', $offer_grid_list_args); ?>
                
                <?php if (!$is_paged && $button) : ?>
                    <a href="<?= $button['url']; ?>" class="btn btn--secondary btn--secondary--arrow d-md-none d-flex">
                        <?= $button['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>