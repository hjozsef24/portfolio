<div class="filter-form--group">
    <label for="city-region"><?php _e('City/Region', 'ua'); ?></label>
    <select name="city-region" id="city-region">
        <option disabled hidden selected="selected" value="default"><?php _e('Select a city or region', 'ua'); ?></option>

        <?php foreach ($city_region as $city) : ?>
            <option value="<?php echo $city; ?>"><?php echo $city; ?></option>
        <?php endforeach; ?>
    </select>
</div>