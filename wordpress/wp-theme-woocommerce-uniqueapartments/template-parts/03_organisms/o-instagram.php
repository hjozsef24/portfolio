<section class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-xxl-1 col-xxl-10 col-12">
                <h3 class="responsive-32"><?php _e('Instagram', 'ua'); ?></h3>

                <?php if ($instagram_account) : ?>
                    <?php set_query_var('instagram_account', $instagram_account); ?>
                    <?php get_template_part('template-parts/02_molecules/m-instagram-header'); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php echo do_shortcode($instagram_feed); ?>

    <?php if ($instagram_account) : ?>
        <?php set_query_var('instagram_account', $instagram_account); ?>
        <?php get_template_part('template-parts/02_molecules/m-instagram-button'); ?>
    <?php endif; ?>
</section>