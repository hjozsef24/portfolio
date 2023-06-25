<?php
$args = array(
    'post_type' => 'shop-the-look-cpt',
    'order'     => 'DESC',
    'orderby'   => 'date',
    'posts_per_page' => -1,
);

$qry = new WP_Query($args);
?>

<?php if ($qry->have_posts()) : ?>
    <section class="shop-the-look">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="shop-the-look-gallery">
                    <?php while ($qry->have_posts()) : $qry->the_post(); ?>
                        <?php $id = get_the_ID(); ?>
                        <?php set_query_var('id', $id); ?>
                        <?php get_template_part('template-parts/02_molecules/m-shop-the-look'); ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
