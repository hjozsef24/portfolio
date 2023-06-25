<?php $is_sponsors_hidden = get_field('is_sponsors_hidden', 'options'); ?>
<?php $sponsors_title = get_field('sponsors_title', 'options'); ?>
<?php $sponsors = get_field('sponsors', 'options'); ?>

<?php if ($sponsors && !$is_sponsors_hidden) : ?>
    <section class="sponsors">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php set_query_var('sponsors_title', $sponsors_title); ?>
                    <?php set_query_var('sponsors', $sponsors); ?>
                    <?php get_template_part('template-parts/02_molecules/m-sponsors'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>