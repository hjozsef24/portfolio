<div class="program-card js-program-card" data-timestamp="<?php echo $timestamp; ?>" data-program-types="<?php echo $type_ids ?>" data-program-ages="<?php echo $age_ids; ?>" data-program-times="<?php echo $date_ids; ?>">
    <div class="program_taxonomies">
        <?php if ($program_ages) : ?>
            <?php foreach ($program_ages as $program_age) : ?>
                <?php $program_age_id = $program_age->term_id; ?>
                <?php $program_age_name = $program_age->name; ?>
                <?php $program_age_image = get_field('filter_icon', 'programs-category-ages_' . $program_age_id); ?>
                <div class="program_taxonomy__wrapper">
                    <img src="<?php echo $program_age_image; ?>" alt="Icon">
                    <p><?php echo $program_age_name ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <?php if ($program_types) : ?>
            <?php foreach ($program_types as $program_type) : ?>
                <?php $program_type_id = $program_type->term_id; ?>
                <?php $program_type_name = $program_type->name; ?>

                <?php $type_icon = get_field('filter_icon', 'programs-category-types_' . $program_type_id); ?>
                <div class="program_taxonomy__wrapper">
                    <img src="<?php echo $type_icon; ?>" alt="Icon">
                    <p><?php echo $program_type_name ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <img data-id="<?php echo $id; ?>" class="js-toggle-favourite-program js-unliked-button toggle-favourite-program" src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-heart.svg" alt="Like icon">

    <?php if ($thumbnail) : ?>
        <a href="<?php echo $permalink; ?>">
            <div class="program-card--image__wrapper">
                <img src="<?php echo $thumbnail['url']; ?>" alt="<?php echo get_image_alt($thumbnail); ?>">
            </div>
        </a>
    <?php endif; ?>

    <div class="text-block js-text-block">
        <div class="program-info">
            <?php if ($program_place_name) : ?>
                <div class="program-card--place__wrapper">
                    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/pin.svg" alt="">
                    <p><?php echo $program_place_name; ?></p>
                </div>
            <?php endif; ?>

            <?php if ($program_times) : ?>
                <div class="program-card--place__wrapper">
                    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-calendar.svg" alt="">
                    <p><?php echo $program_times; ?></p>
                </div>
            <?php endif; ?>
        </div>

        <a href="<?php echo $permalink; ?>">
            <h4 class="js-search-title"><?php echo $title; ?></h4>
        </a>

        <div class="program-card--post-info">
            <?php if ($date) : ?>
                <p><?php echo $date; ?></p>
            <?php endif; ?>

            <?php if ($reading_time) : ?>
                <p><?php echo $reading_time; ?></p>
            <?php endif; ?>
        </div>
        <div class="js-program-text-wrapper">
            <p class="js-program-excerpt program-excerpt"><?php echo $excerpt; ?></p>
        </div>

        <div class="go-to-program__wrapper">
            <a class="go-to-program" href="<?php echo $permalink; ?>"><?php _e('Tovább', 'gyereksziget'); ?></a>
        </div>

    </div>
</div>