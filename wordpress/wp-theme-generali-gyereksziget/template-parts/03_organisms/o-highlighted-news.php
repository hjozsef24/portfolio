<?php $highlighted_news_textfield = get_sub_field('highlighted_news_textfield'); ?>
<?php $news = get_sub_field('news'); ?>
<?php $highlighted_news_btn = get_sub_field('highlighted_news_btn'); ?>


<section class="highlighted-news">
    <div class="container-lg container-fluid highlighted-news--container-background">
        <?php if ($highlighted_news_textfield) : ?>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-12">
                    <div class="highlighted-news--text__wrapper">
                        <?php echo $highlighted_news_textfield; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if ($news) : ?>
            <div class="row justify-content-center js-highlighted-news-slider">
                <?php foreach ($news as $id) : ?>
                    <div class="col-xxl-4 col-xl-6 col-lg-8 col-md-10 col-12">
                        <?php get_news_card($id); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if ($highlighted_news_btn) : ?>
            <a href="<?php echo $highlighted_news_btn['url']; ?>" class="btn btn--centered">
                <?php echo $highlighted_news_btn['title']; ?>
            </a>
        <?php endif; ?>
    </div>
</section>