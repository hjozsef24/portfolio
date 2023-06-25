<?php
function woocommerce_custom_cart()
{
    $cart = '';

    ob_start();

    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();

    $cart .= '<a href="' . $cart_url . '" class="header--secondary-navigation-logo">';
    $cart .= '<img src="' . ASSETS_URI_IMG_SVG . '/icon-cart.svg" alt="' . __("Cart", "ua") . '">';
    $cart .= '<p>'. __('Bundle', 'ua') .'</p>';

    if($cart_count > 0){
        $cart .= '<p class="cart-count">' . $cart_count . '</p>';
    }
    
    $cart .= '</a>';

    ob_get_clean();

    return $cart;
}

