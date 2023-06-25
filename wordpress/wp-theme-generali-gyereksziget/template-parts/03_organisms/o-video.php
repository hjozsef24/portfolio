<?php $youtube_link = get_sub_field("youtube_link"); ?>
<section class="youtube-block">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <div class="video__wrapper">
                    <div class="youtube-player" data-id="<?php echo $youtube_link; ?>"></div>
                </div>
            </div>
        </div>
    </div>
</section>