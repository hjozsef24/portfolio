<?php $section_title = get_sub_field('icon_cards_title'); ?>
<?php $cards = get_sub_field('cards'); ?>
<?php $benefits_template_url = get_template_link('template-benefits.php'); ?>

<section class="section__icon-cards js-icon-cards-section">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-10 col-xl-12">

                <?php if ($section_title) : ?>
                    <h2 class="section__icon-cards__title responsive-font-94"><?php echo $section_title; ?></h2>
                <?php endif; ?>

                <div class="row justify-content-center">
                    <?php foreach ($cards as $card) : ?>
                        <div class="col-xxl-4 col-md-6 col-12">
                            <?php set_query_var('card', $card); ?>
                            <?php get_template_part('template-parts/02_molecules/cards/m-icon-card'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($benefits_template_url) : ?>
                    <a href="<?php echo $benefits_template_url; ?>" class="btn w-fit-content show-more-icon-cards">
                        <?php _e('More', 'waterside'); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>