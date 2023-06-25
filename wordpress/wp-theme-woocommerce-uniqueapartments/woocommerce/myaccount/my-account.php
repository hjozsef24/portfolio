<?php defined('ABSPATH') || exit; ?>

<section class="account">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <h2 class="responsive-32"><?php _e('My account', 'ua'); ?></h2>
                <?php do_action('woocommerce_account_navigation'); ?>
                <?php do_action('woocommerce_account_content'); ?>
            </div>
        </div>
    </div>
</section>