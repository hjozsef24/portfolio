<?php
if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="btn btn--primary">
	<?php esc_html_e('Proceed to checkout', 'woocommerce'); ?>
</a>