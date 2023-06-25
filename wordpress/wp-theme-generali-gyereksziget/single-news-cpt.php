<?php get_header(); ?>

<?php $title = get_the_title(); ?>
<?php $date = get_the_date('Y.m.d'); ?>
<?php $permalink = get_the_permalink(); ?>
<?php $excerpt = get_field('excerpt'); ?>
<?php $facebook_share_link = 'https://www.facebook.com/sharer/sharer.php?u=' . $permalink; ?>
<?php $content_text = get_flexible_content_text($id); ?>
<?php $read_time = estimated_reading_time($content_text); ?>
<?php $related_posts = get_field('related_posts'); ?>
<?php $news_archive_url = get_template_link('template-news-archive.php'); ?>

<section class="single-news">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-6 col-lg-8 col-12 offset-lg-2">
                <h2 class="single-news__title"><?php echo $title; ?></h2>
            </div>
            <div class="col-lg-8 col-12 offset-lg-2">
                <div class="single-news__date-read">
                    <div class="additional-info">
                        <p><?php echo $date; ?></p>
                        <p class="single-news__dot">•</p>
                        <p><?php echo $read_time; ?></p>
                    </div>
                    <div class="single-news__icon__wrapper">
                        <div class="single-news__icon">
                            <a href="<?php echo $facebook_share_link; ?>">
                                <img src="<?php echo ASSETS_URI_IMG; ?>/face.png" alt="<?php echo get_image_alt($image); ?>" srcset="">
                            </a>
                        </div>
                        <div class="single-news__icon js-copy-link">
                            <a href="">
                                <img src="<?php echo ASSETS_URI_IMG; ?>/share.png" alt="<?php echo get_image_alt($image); ?>" srcset="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="single-news__excerpt">
                    <?php echo $excerpt; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_flexible_content(); ?>

<section class="share">
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 offset-lg-2">
                <p class="share__title"><?php _e('Megosztas', 'gyereksziget'); ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-12 offset-lg-2">
                <div class="icon">
                    <a href="<?php echo $facebook_share_link; ?>">
                        <img src="<?php echo ASSETS_URI_IMG; ?>/face.png" alt="<?php echo get_image_alt($image); ?>" srcset="">
                    </a>
                </div>
                <div class="icon js-copy-link">
                    <a href="">
                        <img src="<?php echo ASSETS_URI_IMG; ?>/share.png" alt="<?php echo get_image_alt($image); ?>" srcset="">
                    </a>
                </div>
            </div>
        </div>
        <?php ?>
        <div class="row">
            <div class="col-lg-2 col-12  offset-lg-2">
                <a href="<?php echo $news_archive_url  ?>" class="back-to-new"><?php _e('Vissza a hírekhez', 'gyereksziget'); ?></a>
            </div>
        </div>
        <?php ?>
    </div>
</section>

<?php if ($related_posts) : ?>
<section class="related_news">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="related_news__title"><?php _e('kapcsolodó bejegyzések', 'gyereksziget'); ?></h2>
            </div>
        </div>
        <?php if ($related_posts) : ?>
            <div class="row justify-content-center js-related-news-slider">
                <?php foreach ($related_posts as $id) : ?>
                    <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                        <?php get_news_card($id); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>


<?php get_footer(); ?>