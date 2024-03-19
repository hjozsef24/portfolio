<?php
$title = $args['title'];
$post_date = $args['post_date'];
$highlighted_image = $args['highlighted_image'];
$overlay_is_hidden = $args['overlay_is_hidden'];
?>

<section class="section__post-type-hero">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <div class="post-type-hero__wrapper <?= !$overlay_is_hidden ? 'has-overlay' : ''; ?>">
                    <?php if ($highlighted_image) : ?>
                        <img src="<?= $highlighted_image['url']; ?>" alt="<?= get_image_alt($highlighted_image); ?>" class="post-type-hero__image ofi-cover-center-center">
                    <?php endif; ?>

                    <?php if ($title) : ?>
                        <h2 class="post-type-hero__title"><?= $title; ?></h2>
                    <?php endif; ?>

                    <?php if($post_date): ?>
                        <p class="post-type-hero__date"><?= $post_date; ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>