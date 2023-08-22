<?php $feature_toggle_text = get_sub_field('feature_toggle_text'); ?>
<?php $feature_toggle_features = get_sub_field('feature_toggle_features'); ?>
<?php $pdf_button_text = get_sub_field('pdf_button_text'); ?>
<?php $pdf_to_download = get_sub_field('pdf_to_download'); ?>

<section class="section__feature-toggle">
    <div class="container-fluid">
        <?php if ($feature_toggle_text) : ?>
            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-10 col-12">
                    <h6 class="section__feature-toggle__title"><?php echo $feature_toggle_text; ?></h6>
                </div>
            </div>
        <?php endif; ?>

        <div class="row">
            <div class="col-12">
                <div class="feature-toggle__switcher__wrapper">
                    <h5 class="js-feature-toggle-title feature-toggle__title is-active"><?php _e('Basic', 'waterside') ?></h5>
                    <div class="feature-toggle__switcher js-feature-toggle"></div>
                    <h5 class="js-feature-toggle-title feature-toggle__title"><?php _e('Premium', 'waterside') ?></h5>
                </div>
            </div>
        </div>
    </div>

    <?php if ($feature_toggle_features) : ?>
        <div class="container-fluid px-0">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-12">
                    <div class="feature-card__wrapper">
                        <?php foreach ($feature_toggle_features as $feature) : ?>
                            <?php set_query_var('feature', $feature); ?>
                            <?php get_template_part('template-parts/02_molecules/cards/m-feature-card'); ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($pdf_to_download) : ?>
        <div class="container-fluid container--download-pdf">
            <div class="row justify-content-center">
                <div class="col-12">
                    <a download href="<?php echo $pdf_to_download; ?>" class="btn btn--primary btn--lighter-blue btn--download"><?php echo $pdf_button_text; ?></a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>