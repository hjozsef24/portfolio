<div class="tabs--title__wrapper">
    <div class="js-tab-filter-pill tab-filter--pill"></div>
    <?php foreach ($tabs_repeater as $i => $repeater) : ?>
        <?php $tab_title = $repeater['tab_title']; ?>
        <?php $tab_subtitle = $repeater['tab_subtitle']; ?>

        <div class="tab__titles js-tab-filter" data-id="<?php echo $i; ?>">
            <?php if ($tab_title) : ?>
                <p class="title"><?php echo $tab_title; ?></p>
            <?php endif; ?>

            <?php if ($tab_subtitle) : ?>
                <p class="subtitle"><?php echo $tab_subtitle; ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>