<?php $previous_ids = []; ?>

<div class="filter-form--group">
    <label for="style"><?php _e('Style', 'ua'); ?></label>
    <select name="style" id="style">
        <option disabled hidden selected="selected" value="default">
            <?php _e('Select a style', 'ua'); ?>
        </option>

        <?php foreach ($styles as $style) : ?>
            <?php
            $style_id = $style[0]->term_id;

            if (in_array($style_id, $previous_ids)) {
                continue;
            }

            $previous_ids[] = $style_id;
            $style_name = $style[0]->name;

            var_export($styles);
            ?>

            <option value="<?php echo $style_id; ?>"><?php echo $style_name; ?></option>
        <?php endforeach; ?>
    </select>
</div>