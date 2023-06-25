<section class="highlighted-developments">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-xxl-1 col-xxl-10 col-12">
                <h3 class="responsive-32"><?php _e('Developments', 'ua'); ?></h3>
            </div>
        </div>

        <div class="row">
            <div class="offset-xxl-1 col-xxl-10 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="row js-highlighted-developments-slider highlighted-developments-slider">
                            <?php foreach ($developments as $i => $id) : ?>
                                <?php $last_item = array_key_last($developments); ?>
                                <div class="col-xxl-4 col-md-6 <?php echo $last_item == $i ? 'hidden-tablet' : ''; ?>">
                                    <?php get_highlighted_developments_card($id); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">
                <a href="<?php echo get_post_type_archive_link('developments-cpt'); ?>" class="btn btn--primary btn--centered">
                    <?php _e('SHOW MORE', 'ua'); ?>
                </a>
            </div>
        </div>
    </div>
</section>