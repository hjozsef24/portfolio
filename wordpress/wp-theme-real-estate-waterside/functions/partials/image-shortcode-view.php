<?php if ($sc_atts->src) : ?>
    <div class="image__wrapper">
        <a class="image__wrapper_inner" href="#" data-fancybox data-src="<?php echo $sc_atts->src; ?>" data-caption=" <?php echo $sc_atts->text ?: ''; ?>">
            <img class="img--fluid ofi-cover-center-center" src="<?php echo $sc_atts->src; ?>" alt="<?php echo $sc_atts->alt; ?>">
        </a>
        <?php if ($sc_atts->text) : ?>
            <p class="small image__description">
                <?php echo $sc_atts->text; ?>
            </p>
        <?php endif; ?>
    </div>
<?php endif;
