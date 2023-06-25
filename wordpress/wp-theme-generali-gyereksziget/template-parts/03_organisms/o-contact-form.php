<form class="js-contact-form contact--form">
    <?php if ($topics) : ?>
        <div class="form-group">
            <label for="topic"><?php _e('Tárgy', 'gyereksziget'); ?></label>
            <select name="topic" id="topic">
                <option value="default" disabled selected><?php _e('Válassz kategóriát', 'gyereksziget'); ?></option>
                <?php foreach ($topics as $t) : ?>
                    <?php $topic = $t['topic']; ?>
                    <option value="<?php echo $topic; ?>"><?php echo $topic; ?></option>
                <?php endforeach; ?>
            </select>
            <p class="error-message"></p>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="fullname"><?php _e('Teljes név', 'gyereksziget'); ?></label>
        <input type="text" name="fullname" id="fullname" placeholder="<?php _e('Teljes név', 'gyereksziget'); ?>">
        <p class="error-message"></p>
    </div>

    <div class="form-group">
        <label for="email"><?php _e('E-mail cím', 'gyereksziget'); ?></label>
        <input type="text" name="email" id="email" placeholder="<?php _e('E-mail cím', 'gyereksziget'); ?>">
        <p class="error-message"></p>
    </div>

    <div class="form-group">
        <label for="phone"><?php _e('Telefonszám <span>(opcionális)</span>', 'gyereksziget'); ?></label>
        <input class="js-phone" type="text" name="phone" id="phone" placeholder="<?php _e('+36 30 345 678', 'gyereksziget'); ?>">
        <p class="error-message"></p>
    </div>

    <div class="form-group">
        <label for="company"><?php _e('Cégnév <span>(opcionális)</span>', 'gyereksziget'); ?></label>
        <input type="text" name="company" id="company" placeholder="<?php _e('Cégnév', 'gyereksziget'); ?>">
        <p class="error-message"></p>
    </div>

    <div class="form-group">
        <label for="message"><?php _e('Üzenet', 'gyereksziget'); ?></label>
        <textarea name="message" id="message" placeholder="<?php _e('Üzenet', 'gyereksziget'); ?>"></textarea>
        <p class="error-message"></p>
    </div>

    <div class="form-group checkbox__wrapper">
        <input type="checkbox" id="contact-gdpr" name="contact-gdpr">
        <label for="contact-gdpr" class="contact-gdpr"><?php echo $gdpr_text; ?></label>
    </div>

    <div class="submit-button">
        <button type="submit" class="btn btn--primary"><?php _e('Küldés', 'gyereksziget'); ?></button>
    </div>
</form>