<?php
function include_product_page_template($template)
{
    $type = get_field('product_type');
    if (is_singular('product')) {
        switch ($type) {
            case 'apartment':
                $template = get_stylesheet_directory() . '/woocommerce/templates/single-product-apartments.php';
                break;
            case 'furniture-package':
                $template = get_stylesheet_directory() . '/woocommerce/templates/single-product-furniture-packages.php';
                break;
            case 'shop-the-look':
                $template = get_stylesheet_directory() . '/woocommerce/templates/single-product-shop-the-look.php';
                break;
        }
    }

    return $template;
}
add_filter('template_include', 'include_product_page_template');