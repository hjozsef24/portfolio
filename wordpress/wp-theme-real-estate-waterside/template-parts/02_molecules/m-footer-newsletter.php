<?php if ($footer_newsletter_title) : ?>
    <p class="footer_newsletter_title"><?php echo $footer_newsletter_title; ?></p>
<?php endif; ?>

<form class="js-newsletter-subscribe">
    <div class="footer__newsletter-inner__wrapper">
        <div>
            <div class="input-group input-group--footer js-input-group">
                <input type="text" name="name" id="name">
                <div class="input-group__placeholder js-placeholder"><?php _e('First name', 'waterside'); ?>*</div>
                <p class="error-message js-error-message"></p>
            </div>

            <div class="input-group input-group--footer js-input-group">
                <input type="text" name="surname" id="surname">
                <div class="input-group__placeholder js-placeholder"><?php _e('Last name', 'waterside'); ?>*</div>
                <p class="error-message js-error-message"></p>
            </div>

            <div class="input-group input-group--footer js-input-group">
                <input type="email" name="email" id="email">
                <div class="input-group__placeholder js-placeholder"><?php _e('E-mail', 'waterside'); ?>*</div>
            </div>
        </div>

        <button type="submit" class="btn btn--arrow">
            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-blue.svg" alt="">
        </button>
    </div>

    <?php if ($footer_newsletter_gdpr) : ?>
        <div class="input-group input-group--footer input-group--checkbox">
            <label for="newsletter_gdpr">
                <?php echo $footer_newsletter_gdpr; ?>
                <input type="checkbox" name="newsletter_gdpr" id="newsletter_gdpr">
                <span class="checkmark"></span>
            </label>
        </div>
    <?php endif; ?>
</form>