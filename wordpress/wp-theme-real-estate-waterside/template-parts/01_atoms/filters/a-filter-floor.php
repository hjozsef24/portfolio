<div class="filter-form--group <?php echo $divider ? 'filter-form--group--divider' : ''?>">
    <label for="floor-min" class="label--title">
        <?php _e('Floor', 'waterside'); ?>
    </label>
    <div class="input-group">
        <span><?php _e('From', 'waterside'); ?></span>
        <input type="text" name="floor-min" id="floor-min" class="js-input-number" placeholder="1">

        <div class="input-group__divider"></div>

        <span><?php _e('To', 'waterside'); ?></span>
        <input type="text" name="floor-max" id="floor-max" class="js-input-number" placeholder="10">
    </div>
</div>