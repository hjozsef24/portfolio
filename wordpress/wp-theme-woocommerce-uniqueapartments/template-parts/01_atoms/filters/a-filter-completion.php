<div class="filter-form--group">
    <label for="completion"><?php _e('Year of completion', 'ua'); ?></label>
    <select name="completion" id="completion">
        <option disabled hidden selected="selected" value="default">
            <?php _e('Select a  year', 'ua'); ?>
        </option>

        <?php foreach ($completions as $completion) : ?>ű
            
            <?php if (is_object($completions[0])) : ?>
                <?php $value = $completion->term_id; ?>
                <?php $label = $completion->name; ?>
            <?php else : ?>
                <?php $value = $completion; ?>
                <?php $label = $completion; ?>
            <?php endif; ?>

            <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
        <?php endforeach; ?>

    </select>
</div>