<div class="gallery--title__wrapper">
    <div class="js-gallery-filter-pill gallery-filter--pill"></div>
    <?php foreach ($program_dates as $i => $date) : ?>
        <?php $term_id = $date->term_id; ?>
        <?php $name_in_filter_section = get_field('name_in_filter_section', 'term_' . $term_id); ?>
        <?php $term_name = $name_in_filter_section ? $name_in_filter_section : $date->name; ?>

        <div class="gallery__titles js-gallery-filter" data-id="<?php echo $i; ?>">
            <p class="title"><?php echo $term_name; ?></p>
        </div>
    <?php endforeach; ?>
</div>