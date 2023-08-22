<?php $first_value =  strtolower(preg_replace('/\s*/', '', $first_option)); ?>
<?php $second_value =  strtolower(preg_replace('/\s*/', '', $second_option)); ?>

<div class="input-group--checkbox__wrapper">
    <div class="input-group--checkbox">
        <label for="<?php echo $first_value; ?>">
            <?php echo $first_option; ?>
            <input type="checkbox" name="<?php echo $first_value; ?>" id="<?php echo $first_value; ?>">
            <span class="checkmark"></span>
        </label>
    </div>

    <?php if ($text_divider) : ?>
        <span class="text-divider"><?php _e('or', 'waterside'); ?></span>
    <?php endif; ?>

    <div class="input-group--checkbox">
        <label for="<?php echo $second_value; ?>">
            <?php echo $second_option; ?>
            <input type="checkbox" name="<?php echo $second_value; ?>" id="<?php echo $second_value; ?>">
            <span class="checkmark"></span>
        </label>
    </div>
</div>