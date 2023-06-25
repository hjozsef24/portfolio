<?php $newsletter_title = get_field('newsletter_title', 'options'); ?>
<?php $newsletter_subtitle = get_field('newsletter_subtitle', 'options'); ?>
<?php $newsletter_gdpr = get_field('newsletter_gdpr', 'options'); ?>
<?php $newsletter_age_check = get_field('newsletter_age_check', 'options'); ?>

<div class="newsletter__wrapper">
    <h1 class="newsletter--title"><?php echo $newsletter_title; ?></h1>
    <p class="newsletter--subtitle"><?php echo $newsletter_subtitle; ?></p>

    <form class="js-newsletter-form">
        <div class="form-row">
            <div class="form-group">
                <label for="lastname"><?php _e('Vezetékneved', 'gyereksziget'); ?></label>
                <input type="text" name="lastname" id="lastname" >
                <p class="error-message"></p>
            </div>

            <div class="form-group">
                <label for="firstname"><?php _e('Keresztneved', 'gyereksziget'); ?></label>
                <input type="text" name="firstname" id="firstname" >
                <p class="error-message"></p>
            </div>
        </div>

        <div class="form-group">
            <label for="email"><?php _e('Email címed', 'gyereksziget'); ?></label>
            <input type="email" name="email" id="email" >
            <p class="error-message"></p>
        </div>

        <div class="form-group checkbox__wrapper">
            <input type="checkbox" id="newsletter-age" name="newsletter-age">
            <label for="newsletter-age"><?php echo $newsletter_age_check; ?></label>
        </div>

        <div class="form-group checkbox__wrapper">
            <input type="checkbox" id="newsletter-gdpr" name="newsletter-gdpr">
            <label for="newsletter-gdpr"><?php echo $newsletter_gdpr; ?></label>
        </div>

        <div class="newsletter__form__button">
            <button type="submit" class="btn btn--primary"><?php _e('Feliratkozom', 'gyereksziget'); ?></button>
        </div>

    </form>
</div>