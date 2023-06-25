<?php
/* Remove the a tag from product image on single product templates */
function remove_product_page_product_image_link($html)
{
  return strip_tags($html, '<div><img>');
}
add_filter('woocommerce_single_product_image_thumbnail_html', 'remove_product_page_product_image_link');


/* Add extra checkboxes for checkout page */
function add_checkout_checkbox()
{
  $woocommerce_checkout_gdpr_text = get_field('woocommerce_checkout_gdpr_text', 'options', false);
  woocommerce_form_field('checkout_checkbox', array( // CSS ID
    'type'          => 'checkbox',
    'class'         => array('form-row mycheckbox'), // CSS Class
    'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
    'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
    'required'      => true,
    'label'         => $woocommerce_checkout_gdpr_text,
  ));
}
add_action('woocommerce_review_order_before_submit', 'add_checkout_checkbox', 10);


/* Alert if checkbox not checked */
function add_checkout_checkbox_warning()
{
  if (!(int) isset($_POST['checkout_checkbox'])) {
    wc_add_notice(__('Please accept the Privacy Policy.'), 'error');
  }
}
add_action('woocommerce_checkout_process', 'add_checkout_checkbox_warning');


/* Remove menu items from WooCommerce Profile page */
function remove_menu_items_from_profile_page($menu_links)
{
  unset($menu_links['downloads']);
  return $menu_links;
}
add_filter('woocommerce_account_menu_items', 'remove_menu_items_from_profile_page');