<?php
$button_type = $sc_atts->button_type ? " {$sc_atts->button_type}" : '';
$title = esc_html($sc_atts->title);
$link = esc_url($sc_atts->link);
?>

<a href="<?= $link ?>" target="<?= esc_html($sc_atts->button_target); ?>" class="btn <?= $button_type; ?>">
    <?php if ($title) : ?>
        <?= $title; ?>
    <?php endif; ?>
</a>