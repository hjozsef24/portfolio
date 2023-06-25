<div class="js-newsletter-modal contact-modal">
    <img class="contact-modal--close js-close-newsletter-modal" src="<?php echo ASSETS_URI_IMG_SVG; ?>/modal-close-x.svg" alt="" >
    <div class="js-newsletter-modal-success modal-success">
        <?php if ($modal_success_title) : ?>
            <h3>
                <?php echo $modal_success_title; ?>
            </h3>
        <?php endif; ?>

        <?php if ($modal_success_text) : ?>
            <p><?php echo $modal_success_text; ?></p>
        <?php endif; ?>

        <?php if ($modal_success_button) : ?>
            <a class="btn btn--centered" href="<?php echo $modal_success_button['url']; ?>">
                <?php echo $modal_success_button['title']; ?>
            </a>
        <?php endif; ?>
    </div>

    <div class="js-newsletter-modal-error modal-error">
        <?php if ($modal_unsuccess_title) : ?>
            <h3>
                <?php echo $modal_unsuccess_title; ?>
            </h3>
        <?php endif; ?>

        <?php if ($modal_unsuccess_text) : ?>
            <p><?php echo $modal_unsuccess_text; ?></p>
        <?php endif; ?>

        <?php if ($modal_unsuccess_button) : ?>
            <a class="btn btn--centered" href="<?php echo $modal_unsuccess_button['url']; ?>">
                <?php echo $modal_unsuccess_button['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</div>