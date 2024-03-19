<?php
$title = $args['title'];
$description = $args['description'];
$gdpr_checkbox_text = $args['gdpr_checkbox_text'];
$extra_gdpr_text = $args['extra_gdpr_text'];
$button_label = $args['button_label'];
$list_id = $args['list_id'];
$success_subscribe_assets = $args['success_subscribe_assets'];
?>

<div class="newsletter__wrapper newsletter__wrapper--two-column">
    <div class="newsletter__wrapper__inner">
        <div class="text__wrapper">
            <?php if ($title) : ?>
                <h2><?= $title; ?></h2>
            <?php endif; ?>

            <?php if ($description) : ?>
                <p><?= $description; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__wrapper js-newsletter-block">
            <form class="js-newsletter-form" data-list_id="<?= $list_id; ?>" autocomplete="off">
                <div class="input__wrapper">
                    <div class="input-group js-input-group">
                        <label for="email"><?= _e('E-mail cím', 'lurdy') ?></label>
                        <input type="email" name="email" id="email">
                        <p class="js-helper-text helper-text"></p>
                    </div>

                    <div class="input-group js-input-group">
                        <label for="firstname"><?= _e('Keresztnév', 'lurdy') ?></label>
                        <input type="text" name="firstname" id="firstname">
                        <p class="js-helper-text helper-text"></p>
                    </div>
                </div>

                <?php if ($gdpr_checkbox_text) : ?>
                    <div class="input-group--checkbox js-input-group">
                        <label for="gdpr">
                            <?= $gdpr_checkbox_text; ?>
                            <input type="checkbox" name="gdpr" id="gdpr">
                            <span class="checkmark"></span>
                            <p class="js-helper-text helper-text"></p>
                        </label>
                    </div>
                <?php endif; ?>

                <?php if ($extra_gdpr_text) : ?>
                    <div class="extra_gdpr_text">
                        <?= $extra_gdpr_text; ?>
                    </div>
                <?php endif; ?>

                <div class="button__wrapper">
                    <button type="submit" class="btn btn--primary js-submit-button">
                        <?= $button_label; ?>
                    </button>

                    <div class="loader__wrapper">
                        <div class="js-loader loader"></div>
                    </div>
                </div>
            </form>
        </div>

        <div class="js-success-block success-block">
            <?php if($success_subscribe_assets['title']): ?>
                <h2><?= $success_subscribe_assets['title']; ?></h2>
            <?php endif; ?>            
            
            <?php if($success_subscribe_assets['message']): ?>
                <p><?= $success_subscribe_assets['message']; ?></p>
            <?php endif; ?>

            <button type="submit" class="btn btn--primary js-reset-form-block"><?= $success_subscribe_assets['button_label']; ?></button>
        </div>
        <img src="<?= asset('circle-blue-whole.svg', '', 'images/decors'); ?>" alt="Decor" class="newsletter__decor-blue">
        <img src="<?= asset('circle-green.svg', '', 'images/decors'); ?>" alt="Decor" class="newsletter__decor-green">
        <img src="<?= asset('circle-grey.svg', '', 'images/decors'); ?>" alt="Decor" class="newsletter__decor-grey">
    </div>
</div>