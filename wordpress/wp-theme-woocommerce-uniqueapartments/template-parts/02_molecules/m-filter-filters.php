<?php if ($apartments) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-apartments'); ?>
<?php endif; ?>

<?php if ($city_region) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-city-region'); ?>
<?php endif; ?>

<?php if ($projects) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-projects'); ?>
<?php endif; ?>

<?php if ($completions) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-completion'); ?>
<?php endif; ?>

<?php if ($floors) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-floors'); ?>
<?php endif; ?>

<?php if ($styles) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-styles'); ?>
<?php endif; ?>

<?php if ($bedrooms) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-bedrooms'); ?>
<?php endif; ?>

<?php if ($size) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-size'); ?>
<?php endif; ?>

<?php if ($price) : ?>
    <?php get_template_part('template-parts/01_atoms/filters/a-filter-price'); ?>
<?php endif; ?>

<?php if ($garden || $balcony) : ?>
    <div class="checkbox__wrapper d-xl-none d-flex">
        <?php if ($garden) : ?>
            <?php get_template_part('template-parts/01_atoms/filters/a-filter-garden'); ?>
        <?php endif; ?>

        <?php if ($balcony) : ?>
            <?php get_template_part('template-parts/01_atoms/filters/a-filter-balcony'); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php get_template_part('template-parts/01_atoms/filters/a-filter-button'); ?>

<?php if ($garden || $balcony) : ?>
    <div class="checkbox__wrapper d-xl-flex d-none">
        <?php if ($garden) : ?>
            <?php get_template_part('template-parts/01_atoms/filters/a-filter-garden'); ?>
        <?php endif; ?>

        <?php if ($balcony) : ?>
            <?php get_template_part('template-parts/01_atoms/filters/a-filter-balcony'); ?>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php get_template_part('template-parts/01_atoms/filters/a-reset-filters'); ?>