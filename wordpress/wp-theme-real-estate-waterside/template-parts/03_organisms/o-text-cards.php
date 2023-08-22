<?php $cards = get_sub_field('text-cards'); ?>

<section class="section__text-card">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-10 col-12">
                <div class="text-card__wrapper">
                    <?php foreach ($cards as $card) : ?>
                        <?php set_query_var('card', $card); ?>
                        <?php get_template_part('template-parts/02_molecules/cards/m-text-card') ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>