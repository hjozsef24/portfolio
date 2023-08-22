<?php if ($qry->have_posts()) : ?>
    <section class="section__apartments-list">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php while ($qry->have_posts()) : $qry->the_post(); ?>
                        <?php $id = get_the_ID(); ?>
                        <?php set_query_var('id', $id); ?>
                        <?php get_template_part('template-parts/02_molecules/cards/m-apartment-list-card'); ?>
                    <?php endwhile; ?>

                    <?php set_query_var('query', $qry); ?>
                    <?php get_template_part('template-parts/03_organisms/o-pagination'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>