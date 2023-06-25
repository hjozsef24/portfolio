<?php remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40); ?>
<?php remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5); ?>
<?php do_action('woocommerce_single_product_summary'); ?>

