<?php get_header(); ?>

<?php $post_types = array('product', 'developments-cpt', 'references-cpt', 'homes-for-sale-cpt'); ?>
<?php $has_posts = false; ?>
<?php $result_title_products = __('Search results in Products', 'ua'); ?>
<?php $result_title_developments = __('Search results in Developments', 'ua'); ?>
<?php $result_title_references = __('Search results in References', 'ua'); ?>
<?php $result_title_homes_for_sale = __('Search results in Homes For Sale', 'ua'); ?>

<?php foreach ($post_types as $post_type) : ?>
    <?php
    $args = array(
        'post_type' => $post_type,
        'posts_per_page' => -1,
        's' => get_search_query(),
        'post_status' => 'publish',
        'orderby' => $post_type
    );
    ?>

    <?php $query = new WP_Query($args); ?>

    <?php if ($query->have_posts()) : ?>
        <?php $post_ids = wp_list_pluck($query->posts, 'ID'); ?>
        <div class="container-fluid">
            <div class="row">
                <?php switch ($post_type):
                    case 'product':
                        echo '<h3 class="responsive-32">' . $result_title_products . '</h3>';
                        foreach ($post_ids as $post_id) {
                            ob_start();
                            get_product_card($post_id);
                            $card = ob_get_contents();
                            ob_end_clean();
                            echo '<div class="col-xxl-4 col-md-6 col-12">' . $card . '</div>';
                        }
                        break;

                    case 'developments-cpt':
                        echo '<h3 class="responsive-32">' . $result_title_developments . '</h3>';
                        foreach ($post_ids as $post_id) {
                            ob_start();
                            get_developments_card($post_id);
                            $card = ob_get_contents();
                            ob_end_clean();
                            echo '<div class="col-xxl-4 col-md-6 col-12">' . $card . '</div>';
                        }
                        break;

                    case 'references-cpt':
                        echo '<h3 class="responsive-32">' . $result_title_references . '</h3>';
                        foreach ($post_ids as $post_id) {
                            ob_start();
                            get_references_card($post_id);
                            $card = ob_get_contents();
                            ob_end_clean();
                            echo '<div class="col-xxl-4 col-md-6 col-12">' . $card . '</div>';
                        }
                        break;

                    case 'homes-for-sale-cpt':
                        echo '<h3 class="responsive-32">' . $result_title_homes_for_sale . '</h3>';
                        foreach ($post_ids as $post_id) {
                            ob_start();
                            get_home_for_sale_card($post_id);
                            $card = ob_get_contents();
                            ob_end_clean();
                            echo '<div class="col-xxl-4 col-md-6 col-12">' . $card . '</div>';
                        }
                        break;
                ?>
                <?php endswitch; ?>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; ?>

<?php get_footer(); ?>