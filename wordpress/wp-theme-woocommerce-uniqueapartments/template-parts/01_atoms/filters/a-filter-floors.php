<div class="filter-form--group">
    <label for="floor"><?php _e('Floor', 'ua'); ?></label>
    <select name="floor" id="floor">
        <option disabled hidden selected="selected" value="default">
            <?php _e('Show all', 'ua'); ?>
        </option>

        <?php foreach ($floors as $floor) : ?>
            <?php $floor_id = $floor->term_id; ?>
            <?php $floor_name = $floor->name; ?>

            <option value="<?php echo $floor_id; ?>"><?php echo $floor_name; ?></option>
        <?php endforeach; ?>
    </select>
</div>