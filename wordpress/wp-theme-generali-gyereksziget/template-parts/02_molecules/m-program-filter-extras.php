<?php $program_book = get_field('program_book', 'options') ?>

<div class="d-flex justify-content-space-between">
    <div class="d-flex">
        <?php get_template_part('template-parts/01_atoms/a-program-counter'); ?>
        <?php get_template_part('template-parts/01_atoms/a-program-filter-current-programs'); ?>
    </div>

    <?php if ($program_book) : ?>
        <?php set_query_var('program_book', $program_book); ?>
        <?php get_template_part('template-parts/01_atoms/a-download-program-book'); ?>
    <?php endif; ?>
</div>