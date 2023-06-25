<?php $tabs_repeater = get_sub_field('tabs'); ?>

<section class="tabs">
    <div class="container-fluid custom-container-spacing">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-12">
                <?php set_query_var('tabs_repeater', $tabs_repeater) ?>
                <?php get_template_part('template-parts/02_molecules/m-tabs-filter'); ?>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <?php set_query_var('tabs_repeater', $tabs_repeater); ?>
        <?php get_template_part('template-parts/02_molecules/m-tabs'); ?>
    </div>
</section>