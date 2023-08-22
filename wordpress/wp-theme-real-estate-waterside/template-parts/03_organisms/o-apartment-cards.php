<?php $title = get_sub_field('apartments_card_section_title'); ?>
<?php $apartments = get_sub_field('apartments'); ?>
<?php $apartments_archive_url = get_post_type_archive_link('apartments-cpt'); ?>

<section class="section__apartment-cards">
    <div class="container-fluid">
        <?php if ($title) : ?>
            <div class="row">
                <div class="col-12">
                    <h2 class="section__apartment-cards__title responsive-font-94"><?php echo $title; ?></h2>
                </div>
            </div>
        <?php endif; ?>

        <div class="row justify-content-center">
            <?php foreach ($apartments as $id) : ?>
                <div class="col-xl-3 col-sm-6 col-12">
                    <?php set_query_var('id', $id); ?>
                    <?php get_template_part('template-parts/02_molecules/cards/m-apartment-card'); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <?php if ($apartments_archive_url) : ?>
            <div class="row justify-content-center">
                <div class="col-12">
                    <a href="<?php echo $apartments_archive_url; ?>" class="btn btn--primary show-all-apartments">
                        <?php _e('Show all apartments', 'waterside'); ?>
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>