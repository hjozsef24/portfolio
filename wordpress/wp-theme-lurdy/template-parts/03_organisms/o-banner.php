<?php
$post_id = get_sub_field('banner');
$post_id = $post_id ? $post_id[0] : false;
$overlay_is_hidden = get_field('overlay_is_hidden', $post_id);
$background = get_field('background', $post_id);
$title = get_field('title', $post_id);
$description = get_field('description', $post_id);
$link = get_field('link', $post_id);
$narrow_width = get_field('narrow_width', $post_id);
?>

<section class="section__banner">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="<?= $narrow_width ? 'col-xl-8' : "col-xl-10"; ?> col-12">
            
                <div class="banner__wrapper <?= !$overlay_is_hidden ? 'has-overlay' : ''; ?>">
                    <?php if ($background) : ?>
                        <img src="<?= $background['url']; ?>" alt="<?= get_image_alt($background); ?>" class="banner__image ofi-cover-center-center">
                    <?php endif; ?>

                    <div class="banner__inner">
                        <?php if ($title) : ?>
                            <h3 class="banner__title"><?= $title; ?></h3>
                        <?php endif; ?>

                        <?php if ($description) : ?>
                            <div class="banner__description"><?= $description; ?></div>
                        <?php endif; ?>

                        <?php if ($link) : ?>
                            <a href="<?= $link['url']; ?>" class="btn btn--primary btn--primary--arrow">
                                <?= $link['title']; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>