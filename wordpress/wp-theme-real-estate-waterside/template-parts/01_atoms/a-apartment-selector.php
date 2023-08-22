<?php $list_of_plans_url = get_post_type_archive_link('apartments-cpt'); ?>
<div class="header__apartment-selector">
    <div class="header__apartment-selector--title js-dropdown-toggle">
        <p data-text-hover="<?php _e('Choose an apartment', 'waterside'); ?>" class="animated-text">
            <span><?php _e('Choose an apartment', 'waterside'); ?></span>
        </p>


        <div class="header__apartment-selector--dropdown js-selector-dropdown">
            <a href="#"><?php _e('Visual Choise', 'waterside'); ?></a>
            <?php if ($list_of_plans_url) : ?>
                <div class="header__apartment-selector--divider"></div>
                <a href="<?php echo $list_of_plans_url; ?>"><?php _e('List of plans', 'waterside'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>