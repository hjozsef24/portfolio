<?php defined('ABSPATH') || exit; ?>

<section class="cart">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php
                /*
                * @hooked wc_empty_cart_message - 10
                */
                do_action('woocommerce_cart_is_empty');

                if (wc_get_page_id('shop') > 0) : ?>

                    <p class="return-to-shop btn btn-secondary">
                        <a class="wc-backward" href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
                            <?php
                            /**
                             * Filter "Return To Shop" text.
                             *
                             * @since 4.6.0
                             * @param string $default_text Default text.
                             */
                            echo esc_html(apply_filters('woocommerce_return_to_shop_text', __('Return to shop', 'woocommerce')));
                            ?>
                        </a>
                    </p>

                <?php endif; ?>
            </div>
        </div>
    </div>
</section>