<?php $not_found_title = get_field('not_found_title', 'options'); ?>
<?php $not_found_text = get_field('not_found_text', 'options'); ?>
<?php $not_found_button = get_field('not_found_button', 'options'); ?>

<?php get_header(); ?>

<section class="not-found">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="content__wrapper">
                    <div class="text__wrapper">
                        <?php if ($not_found_title) : ?>
                            <p class="title"><?php echo $not_found_title; ?></p>
                        <?php endif; ?>

                        <?php if ($not_found_text) : ?>
                            <p class="text"><?php echo $not_found_text; ?></p>
                        <?php endif; ?>

                        <div class="buttons__wrapper">
                            <a class="btn btn--centered js-go-back"><?php _e('Vissza', 'gyereksziget'); ?></a>
                            <?php if ($not_found_button) : ?>
                                <a href="<?php echo $not_found_button['url']; ?>" class="btn btn--centered">
                                    <?php echo $not_found_button['title']; ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>