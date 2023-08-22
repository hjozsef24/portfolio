<div class="youtube-player-wrapper">

    <div class="youtube-player" data-id="<?php echo esc_html($sc_atts->id); ?>">
        <div data-id="<?php echo esc_html($sc_atts->id); ?>">
            <?php if ($sc_atts->src) : ?>
            <img class="ofi-cover-center-center img-fluid" src="<?php echo $sc_atts->src; ?>"
                alt="<?php echo $sc_atts->alt; ?>">
            <?php else : ?>
            <img class="ofi-cover-center-center img-fluid"
                src="<?php echo 'https://i.ytimg.com/vi/' . esc_html($sc_atts->id) . '/sddefault.jpg'; ?>" alt="">
            <?php endif; ?>
            <img class="icon__play" src="<?php echo ASSETS_URI_IMG_SVG; ?>/play.svg" alt="">
        </div>
    </div>

    <span class="overlay overlay--light"></span>

    <?php if ($sc_atts->text) : ?>
    <p class="video-text">
        <?php echo esc_html($sc_atts->text); ?>
    </p>
    <?php endif; ?>

</div>