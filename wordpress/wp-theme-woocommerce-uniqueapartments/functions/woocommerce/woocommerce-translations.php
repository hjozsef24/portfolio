<?php
function woocommerce_rewrite_translations($translation, $text, $domain)
{
    if ($domain == 'woocommerce') {
        if ($text == 'Cart updated.') {
            $translation = 'Bundle updated';
        }

        if($text == 'Update cart'){
            $translation = 'Update bundle';
        }        
        
        if($text == 'Cart totals'){
            $translation = 'Bundle totals';
        }        
        
        if($text == 'Cross-sells'){
            $translation = 'Individual Products in the package (Displayed on Shop The Look and Furniture Package product pages)';
        }         
        
        if($text == 'Add to cart'){
            $translation = 'Add to bundle';
        }        
    }

    return $translation;
}

add_filter('gettext', 'woocommerce_rewrite_translations', 10, 3);
