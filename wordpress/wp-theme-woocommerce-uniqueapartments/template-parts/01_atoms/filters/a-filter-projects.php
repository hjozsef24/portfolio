<div class="filter-form--group">
    <label for="project"><?php _e('Project', 'ua'); ?></label>
    <select name="project" id="project">
        <option disabled hidden selected="selected" value="default">
            <?php _e('Project name', 'ua'); ?>
        </option>

        <?php foreach ($projects as $project) : ?>
            <?php $project_id = $project->term_id; ?>
            <?php $project_name = $project->name; ?>

            <option value="<?php echo $project_id; ?>"><?php echo $project_name; ?></option>
        <?php endforeach; ?>
    </select>
</div>