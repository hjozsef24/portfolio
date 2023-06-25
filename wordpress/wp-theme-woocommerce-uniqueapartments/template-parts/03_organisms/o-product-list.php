<?php $queried_object = get_queried_object(); ?>
<?php $term_id = $queried_object->term_id; ?>
<?php $args = create_product_filter_query_args($term_id); ?>
<?php $qry = new WP_Query($args); ?>
<?php $counted_items = $qry->found_posts; ?>

<?php if ($qry->have_posts()) : ?>
    <section class="js-product-list" data-counted-items="<?php echo $counted_items; ?>">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-12">
                    <div class="row">
                        <?php while ($qry->have_posts()) :  ?>
                            <?php $qry->the_post(); ?>
                            <?php $product_id = get_the_ID(); ?>
                            <div class="col-xl-4 col-md-6 col-12">
                                <?php get_product_card($product_id); ?>
                            </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-12">
                            <?php set_query_var('qry', $qry); ?>
                            <?php get_template_part('template-parts/03_organisms/o-pagination'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>