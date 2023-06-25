<div class="d-block">
    <?php if ($title) : ?>
        <p class="checkbox-filter--title"><?php echo $title ?></p>
    <?php endif; ?>

    <div class="checkbox-filter__wrapper">

        <?php foreach ($items as $item) : ?>
            <?php $id = $item->term_id; ?>
            <?php $icon = get_field('filter_icon', $taxonomy . '_' . $id); ?>
            <?php $name = $item->name; ?>

            <div class="checkbox-filter">
                <input type="checkbox" value="<?php echo $id; ?>" id="<?php echo $id; ?>" name="<?php echo $name; ?>" class="<?php echo $javascript_checkbox_class ?>">
                <label for="<?php echo $id; ?>">
                    <?php echo $name; ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
</div>