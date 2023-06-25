<?php $previous_ids = []; ?>

<div class="filter-form--group">
    <label for="apartment"><?php _e('Apartment', 'ua'); ?></label>
    <select name="apartment" id="apartment">
        <option disabled hidden selected="selected" value="default">
            <?php _e('Select an apartment', 'ua'); ?>
        </option>

        <?php foreach ($apartments as $apartment) : ?>
            <?php
            $apartment_id = $apartment[0]->term_id;

            if (in_array($apartment_id, $previous_ids)) {
                continue;
            }

            $previous_ids[] = $apartment_id;
            $apartment_name = $apartment[0]->name;
            ?>

            <option value="<?php echo $apartment_id; ?>"><?php echo $apartment_name; ?></option>
        <?php endforeach; ?>
    </select>
</div>