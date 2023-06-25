<section class="progress">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="progress--cards__wrapper">
                    <?php foreach ($progress as $key => $p) : ?>
                        <?php $image = $p['image']; ?>
                        <?php $text = $p['text']; ?>

                        <?php set_query_var('image', $image); ?>
                        <?php set_query_var('key', $key); ?>
                        <?php set_query_var('text', $text); ?>
                        <?php set_query_var('images_and_texts', $images_and_texts); ?>
                        <?php get_template_part('template-parts/02_molecules/m-card-progress'); ?>

                        <?php // Decor arrows ?>
                        <?php if ($key !== array_key_last($progress)) : ?>
                            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/arrow-grey.svg" alt="" class="progress--arrow">
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>