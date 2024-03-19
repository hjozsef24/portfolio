<?php
$placeholder = $args['placeholder'];
$options = $args['options'];
?>

<div class="js-custom-dropdown custom-dropdown">
    <?php if ($placeholder) : ?>
        <p class="selected-option"><?= $placeholder; ?></p>
    <?php endif; ?>

    <?php if ($options) : ?>
        <div class="dropdown-list">
            <p data-term_id="value"><?= __('Összes', 'lurdy'); ?></p>
            <?php foreach ($options as $o) : ?>
                <p data-value="<?= $o->term_id; ?>"><?= $o->name; ?></p>
            <?php endforeach; ?>
        </div>

        <select class="js-original-select original-select d-none">
            <?php foreach ($options as $o) : ?>
                <option value="<?= $o->term_id; ?>"><?= $o->name; ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
</div>