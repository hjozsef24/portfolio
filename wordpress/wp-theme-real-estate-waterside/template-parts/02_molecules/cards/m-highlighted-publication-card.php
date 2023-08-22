<?php $title = get_the_title($post_id); ?>
<?php $permalink = get_permalink($post_id); ?>
<?php $date = get_the_date('d/m/Y', $post_id); ?>
<?php $excerpt = get_field('excerpt', $post_id); ?>
<?php $content = get_field('content', $post_id); ?>
<?php $main_image = get_field('main_image', $post_id); ?>
<?php $estimated_reading_time = estimated_reading_time($content); ?>
<?php $post_categories = get_the_terms($post_id, 'publications-category'); ?>

<section class="section__highlighted-publication">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-10 d-flex">
                <div class="highlighted-publication__card__text <?php echo !$main_image ? "w-100" : ""; ?>">
                    <div class="publication__header__informations">
                        <div class="date_reading-time__wrapper">
                            <p><?php echo $date; ?></p>
                            <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/decor-dot.svg" alt="">
                            <p><?php echo $estimated_reading_time; ?></p>
                        </div>

                        <?php if ($post_categories) : ?>
                            <?php foreach ($post_categories as $category) : ?>
                                <?php $category_link = get_term_link($category, 'publications-cpt'); ?>
                                <a href="<?php echo $category_link; ?>" class="badge">
                                    <?php echo $category->name; ?>
                                </a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <a class="publication__header__title" href="<?php echo $permalink; ?>"><?php echo $title; ?></a>

                    <?php if ($excerpt) : ?>
                        <p class="publication__header__excerpt"><?php echo $excerpt; ?></p>
                    <?php endif; ?>

                    <a href="<?php echo $permalink; ?>" class="btn btn--primary btn--lighter-blue w-fit-content">
                        <?php _e('Read more', 'waterside'); ?>
                    </a>
                </div>
                <?php if ($main_image) : ?>
                    <div class="highlighted-publication__card__image">
                        <img src="<?php echo $main_image['url']; ?>" alt="<?php echo get_image_alt($main_image); ?>" class="ofi-cover-center-center">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>