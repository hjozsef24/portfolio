<?php $map_svg_id = get_sub_field('map_svg_id'); ?>
<section class="section__map-svg">
    <div class="container-fluid px-0">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode('[mapsvg id="' . $map_svg_id . '"]'); ?>
            </div>
        </div>
    </div>
</section>