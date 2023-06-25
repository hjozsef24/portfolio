<?php

function get_wishlist_products()
{
    $product_ids = $_POST['data'];
    $response = __('Your wishlist is empty.', 'ua');

    if (!$product_ids) {
        echo $response;
        wp_die();
    }

    foreach ($product_ids as $product_id) {
        $post_type = get_post_type($product_id);

        switch ($post_type) {
            case 'homes-for-sale-cpt':
                ob_start();
                get_home_for_sale_card($product_id);
                $product_card = ob_get_clean();
                $response = $product_card;

            case 'references-cpt':
                ob_start();
                get_references_card($product_id);
                $product_card = ob_get_clean();
                $response = $product_card;

            case 'product':
                ob_start();
                get_product_card($product_id);
                $product_card = ob_get_clean();
                $response = $product_card;

            default:
                $response = __("We couldn't find any product from your list.", "ua");
        }
    }

    echo $response;
    wp_die();
}

add_action('wp_ajax_get_wishlist_products', 'get_wishlist_products');
add_action('wp_ajax_nopriv_get_wishlist_products', 'get_wishlist_products');
