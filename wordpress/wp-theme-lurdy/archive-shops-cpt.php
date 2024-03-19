<?php get_header(); ?>

<main class="archive archive--shops-cpt">
    <?php
    get_template_part('template-parts/03_organisms/o-shops-filter'); 
    get_template_part('template-parts/03_organisms/o-shops-grid');
    ?>
</main>

<?php get_footer(); ?>