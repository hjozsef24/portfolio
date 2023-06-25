<div class="program-filter--date-filter">
    <div class="js-related-program-filter-pill program-filter--date-filter--pill"></div>
    <?php foreach ($dates as $i => $date) : ?>
        <?php $date_id = $date->term_id; ?>
        <?php $name_in_filter = get_field('name_in_filter_section', 'programs-category-dates_' . $date_id); ?>
        <?php $date_name = $name_in_filter ? $name_in_filter : $date->name; ?>

        <p class="program-filter--date-filter--date js-related-program-filter" data-id="<?php echo $i; ?>" data-date="<?php echo $date_id; ?>">
            <?php echo $date_name; ?>
        </p>
    <?php endforeach; ?>
</div>