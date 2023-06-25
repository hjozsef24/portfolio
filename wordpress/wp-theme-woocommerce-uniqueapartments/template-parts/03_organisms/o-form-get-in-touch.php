<form class="js-get-in-touch-form get-in-touch-form">
    <div class="input-group">
        <label for="name"><?php _e('Name', 'ua'); ?>*</label>
        <input type="text" name="name" id="name">
        <p class="error-message"></p>
    </div>

    <div class="input-group">
        <label for="email"><?php _e('E-mail address', 'ua'); ?>*</label>
        <input type="email" name="email" id="email">
        <p class="error-message"></p>
    </div>

    <div class="input-group">
        <label for="phone"><?php _e('Phone number', 'ua'); ?>*</label>
        <input type="text" name="phone" id="phone" class="js-phone">
        <p class="error-message"></p>
    </div>

    <div class="input-group">
        <label for="message"><?php _e('Message', 'ua'); ?>*</label>
        <textarea name="message" id="message"></textarea>
        <p class="error-message"></p>
    </div>

    <?php if ($gdpr) : ?>
        <input type="hidden" name="gdpr-active">
        <div class="input-group input-group--checkbox">
            <input type="checkbox" name="gdpr" id="gdpr">
            <label for="gdpr"><?php echo $gdpr; ?>*</label>
        </div>
        <p class="error-message"></p>
    <?php endif; ?>

    <input type="hidden" name="topic" value="<?php echo $topic; ?>">

    <div class="input-group">
        <button type="submit" class="btn btn--primary"><?php _e('Submit', 'ua'); ?></button>
    </div>
</form>