<?php
$heading = get_sub_field('heading');
$heading_type = get_sub_field('heading_type'); //return h2, h3 or h4
$hidden_on_responsive = get_sub_field('hidden_on_responsive'); 
if ($heading) :
?>
    <?php if ($hidden_on_responsive) : ?>
        <div class="d-xl-block d-none app-promotion__heading">
        <?php endif; ?>

        <<?= $heading_type; ?> class="app-promotion__heading">
            <?= $heading; ?>
        </<?= $heading_type; ?>>

        <?php if ($hidden_on_responsive) : ?>
        </div>
    <?php endif; ?>
<?php endif; ?>