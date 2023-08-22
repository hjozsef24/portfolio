<?php $apartment_id = $apartment_id ? $apartment_id : false; ?>
<form class="contact-form js-contact-form" data-apartment-id="<?php echo $apartment_id; ?>">
    <div class="input-group js-input-group">
        <input type="text" name="name" id="name">
        <div class="input-group__placeholder js-placeholder"><?php _e('First name', 'waterside'); ?>*</div>
        <p class="error-message js-error-message"></p>
    </div>

    <div class="input-group js-input-group">
        <input type="text" name="surname" id="surname">
        <div class="input-group__placeholder js-placeholder"><?php _e('Last name', 'waterside'); ?>*</div>
        <p class="error-message js-error-message"></p>
    </div>

    <div class="input-group js-input-group">
        <input type="text" name="phone" id="phone" class="js-input-number">
        <div class="input-group__placeholder js-placeholder"><?php _e('Phone number', 'waterside'); ?>*</div>
        <p class="error-message js-error-message"></p>
    </div>

    <div class="input-group js-input-group">
        <input type="email" name="email" id="email">
        <div class="input-group__placeholder js-placeholder"><?php _e('E-mail', 'waterside'); ?>*</div>
        <p class="error-message js-error-message"></p>
    </div>

    <div class="input-group js-input-group">
        <input type="text" name="note" id="note">
        <div class="input-group__placeholder js-placeholder"><?php _e('Message', 'waterside'); ?>*</div>
        <p class="error-message js-error-message"></p>
    </div>

    <div class="input-group--checkbox">
        <label for="gdpr">
            <?php echo $gdpr; ?>
            <input type="checkbox" name="gdpr" id="gdpr">
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="input-group--checkbox">
        <label for="gdpr_subscribe">
            <?php echo $gdpr_subscribe; ?>
            <input type="checkbox" name="gdpr_subscribe" id="gdpr_subscribe">
            <span class="checkmark"></span>
        </label>
    </div>

    <button type="submit" class="btn btn--arrow btn--arrow--bigger btn--lighter-blue">
        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-arrow-secondary.svg" alt="">
    </button>
</form>