<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (is_user_logged_in()) {
    return;
}

?>

<section class="login">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-12">
                <h1 class="responsive-40"><?php _e('Login', 'ua'); ?></h1>

                <form class="woocommerce-form woocommerce-form-login login" method="post">

                    <?php do_action('woocommerce_login_form_start'); ?>

                    <?php echo ($message) ? wpautop(wptexturize($message)) : ''; // @codingStandardsIgnoreLine 
                    ?>

                    <p class="form-row form-row-first">
                        <label for="username"><?php esc_html_e('Username or email', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                        <input type="text" class="input-text" name="username" id="username" autocomplete="username" />
                    </p>
                    <p class="form-row form-row-last">
                        <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>&nbsp;<span class="required">*</span></label>
                        <input class="input-text woocommerce-Input" type="password" name="password" id="password" autocomplete="current-password" />
                    </p>
                    <div class="clear"></div>

                    <?php do_action('woocommerce_login_form'); ?>

                    <p class="form-row">
                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
                        </label>
                        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                        <input type="hidden" name="redirect" value="<?php echo esc_url($redirect); ?>" />
                        <button type="submit" class="btn btn--primary woocommerce-button button woocommerce-form-login__submit<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="login" value="<?php esc_attr_e('Login', 'woocommerce'); ?>"><?php esc_html_e('Login', 'woocommerce'); ?></button>
                    </p>
                    <p class="lost_password">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
                    </p>

                    <div class="clear"></div>

                    <?php do_action('woocommerce_login_form_end'); ?>

                </form>
            </div>

            <div class="col-xl-5 col-12 my-auto">
                <img src="<?php echo ASSETS_URI_IMG; ?>/decor/decor-login.png" alt="" class="login-decor">
            </div>
        </div>
    </div>
</section>