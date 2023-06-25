<div class="form__wrapper">
    <h4 class="form-title"><?php _e('Egyeztessünk', 'hajdujozsef'); ?></h4>

    <form class="js-contact-form contact-form">
        <div class="js-form-item form-item">
            <p class="js-input-label-active input-label"><?php _e('Teljes név*', 'hajdujozsef'); ?></p>
            <input type="text" name="fullname">
            <p class="error-message"></p>
        </div>

        <div class="js-form-item form-item">
            <p class="js-input-label-active input-label"><?php _e('Cégnév', 'hajdujozsef'); ?></p>
            <input type="text" name="companyname">
        </div>

        <div class="js-form-item form-item">
            <p class="js-input-label-active input-label"><?php _e('E-mail cím*', 'hajdujozsef'); ?></p>
            <input type="email" name="email">
            <p class="error-message"></p>
        </div>

        <div class="js-form-item form-item">
            <p class="js-input-label-active input-label"><?php _e('Telefonszám*', 'hajdujozsef'); ?></p>
            <input type="text" name="phone">
            <p class="error-message"></p>
        </div>

        <div class="js-form-item form-item">
            <p class="js-input-label-active textarea-input-label input-label"><?php _e('Üzenet*', 'hajdujozsef'); ?></p>
            <textarea name="message"></textarea>
            <p class="error-message"></p>
        </div>

        <div class="js-form-item form-item checkbox-group">
            <label class="checkbox">
                <?php _e('Szakmai önéletrajz kérése', 'hajdujozsef') ?>
                <input type="checkbox" name="cv">
                <span class="checkmark"></span>
            </label>
        </div>

        <div class="js-form-item form-item checkbox-group">
            <label class="checkbox">
                <?php echo get_field('form_gdpr', 'options'); ?>
                <input type="checkbox" name="gdpr">
                <span class="checkmark"></span>
            </label>
            <p class="error-message"></p>
        </div>

        <div class="form-item form-item--button">
            <button type="submit" class="js-submit-contact-form button button--filled"><?php _e('Elküldöm!', 'hajdujozsef'); ?></button>
        </div>
    </form>
</div>