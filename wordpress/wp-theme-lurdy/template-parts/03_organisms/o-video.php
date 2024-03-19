<?php
$thumbnail = get_sub_field('thumbnail');
$youtube_video_id = get_sub_field('youtube_video_id');
$thumbnail = $thumbnail ? $thumbnail : 'https://i.ytimg.com/vi/'. $youtube_video_id . '/maxresdefault.jpg';
?>

<section class="section__video">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php if ($youtube_video_id) : ?>
                    <div class="js-youtube-player section__video__player" data-id="<?php echo $youtube_video_id; ?>">
                        <img class="section__video__thumbnail ofi-cover-center-center" src="<?= $thumbnail; ?>" alt="Thumbnail">
                        <img src="<?= asset('play.png', '', 'images/icons'); ?>" alt="" class="section__video__player-icon">
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.videoPlayer();'); ?>