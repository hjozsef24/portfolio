<?php $image = get_sub_field('image-text_image'); ?>
<?php $video_id = get_sub_field('image-text_video'); ?>
<?php $media_type = get_sub_field('media_type'); ?>
<?php $image_aligned_right = get_sub_field('image_aligned_right'); ?>
<?php $section_has_background = get_sub_field('section_has_background'); ?>
<?php $text = get_sub_field('image-text_text'); ?>
<?php $text_length = str_word_count(strip_tags($text)); ?>
<?php $shortened_text = $text_length > 55 ? split_text($text, 400) : false; ?>

<section class="section__image-text <?php echo $section_has_background ? "section__image-text--background" : ""; ?>">
    <div class="container-fluid container-fluid-custom-spacing">
        <div class="row">
            <div class="<?php echo $image_aligned_right ? "offset-1 col-4 order-2" : "col-xl-6 col-12"; ?>">
                <?php if ($media_type == "image") : ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo get_image_alt($image); ?>" class="image-text__image ofi-cover-center-center">
                <?php endif; ?>

                <?php if ($media_type == "video") : ?>
                    <?php $src = "https://www.youtube.com/embed/" . $video_id . "?autoplay=1&amp;rel=0&amp;enablejsapi=1"; ?>
                    <div class="youtube-player" data-fancybox="video" data-src="<?php echo $src; ?>">
                        <img class="image-text__image ofi-cover-center-center" src="https://i.ytimg.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg" alt="">
                        <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-play.svg" alt="" class="youtube-player__icon">
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($text) : ?>
                <div class="<?php echo $image_aligned_right ? "col-4 order-1" : "offset-xxl-1 col-xxl-4 col-xl-6 col-12"; ?>" class="image-text__text">
                    <div class="image-text__text__wrapper">
                        <?php if ($shortened_text) : ?>
                            <div class="image-text__text__shortened-text">
                                <?php echo $shortened_text[0]; ?>

                                <span class="js-hidden-text image-text__text__shortened-text__hidden-text">
                                    <?php echo $shortened_text[1]; ?>
                                </span>

                                <p class="image-text__text__shortened-text__show-more js-toggle-hidden-text">
                                    <?php _e('Read more...', 'waterside') ?>
                                </p>
                            </div>
                        <?php else : ?>
                            <?php echo $text; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>