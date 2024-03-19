<?php
$header_logo = get_field('header_logo', 'options');
$language_switcher_is_hidden = get_field('language_switcher_is_hidden', 'options');
$opening_hours_is_hidden = get_field('opening_hours_is_hidden', 'options');
$opening_hours = get_field('opening_hours', 'options');
$highlighted_button = get_field('highlighted_button', 'options');

$header_main_args = compact(
    'header_logo',
    'language_switcher_is_hidden',
    'opening_hours_is_hidden',
    'opening_hours',
    'highlighted_button'
);

$header_navigation_args = compact(
    'language_switcher_is_hidden',
    'opening_hours_is_hidden',
    'opening_hours',
    'highlighted_button'
);
?>

<header>
    <?php
    get_template_part('template-parts/02_molecules/header/m-header-main', '', $header_main_args);
    get_template_part('template-parts/02_molecules/header/m-header-navigation', '', $header_navigation_args);
    ?>
</header>