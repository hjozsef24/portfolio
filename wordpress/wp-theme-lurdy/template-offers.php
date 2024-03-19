<?php
// Template name: Sablon: Ajánlatok archív

get_header();
$title = get_the_title();
?>

<main class="template template--offers">
    <?php 
    get_template_part('template-parts/03_organisms/o-section-title', '', compact('title')); 
    get_flexible_content();
    ?>
</main>

<?php get_footer(); ?>