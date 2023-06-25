<?php
// False until map will visible on the site too
$template_map_url = false;

// Use this if map will visible
// $template_map_url = get_template_link('template-map.php'); 
?>
<div class="service__card">
    <?php if ($image) : ?>
        <img class="service__image" src="<?php echo $image['url'] ?>" alt="<?php get_image_alt($image); ?>" srcset="">
    <?php endif; ?>
    <h4 class="service__title js-service-title"> <?php echo $title; ?></h4>
    <p class="service__excerpt js-service-excerpt"> <?php echo $excerpt ?></p>
    <?php if ($template_map_url) : ?>
        <div class="service__link">
            <a href="<?php echo $template_map_url; ?>"><?php _e('Térkép', 'gyereksziget'); ?></a>
        </div>
    <?php endif; ?>
</div>