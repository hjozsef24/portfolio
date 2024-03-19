<?php
$post_type = get_post_type();
$excerpt = $args['excerpt'];
$dates = $args['dates'];
$places = $args['places'];
$websites = $args['websites'];

$events_table_args = compact('post_type', 'dates', 'places', 'websites');
?>

<section class="section__single-events-informations">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php if ($excerpt) : ?>
                    <h4><?= $excerpt; ?></h4>
                <?php endif; ?>

                <?php 
                if ($dates || $places || $websites){
                    get_template_part('template-parts/02_molecules/m-information-table', '', $events_table_args);
                } 
                ?>
            </div>
        </div>
    </div>
</section>