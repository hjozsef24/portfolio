<section class="gallery">
    <div class="container-fluid custom-container-spacing">
        <?php foreach ($galleries as $gallery) : ?>
            <?php $main_image = $gallery['main_image']; ?>
            <?php $main_image_align = $gallery['main_image_align']; ?>
            <?php $gallery_images = $gallery['gallery_images']; ?>

            <?php set_query_var('main_image', $main_image); ?>
            <?php set_query_var('gallery_images', $gallery_images); ?>
            <?php get_template_part('template-parts/02_molecules/m-gallery-align-'. $main_image_align); ?>
        <?php endforeach; ?>

    </div>
</section>