<section class="section__information-card">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="section__information-card__wrapper">
                    <?php foreach ($information_cards as $ic) : ?>
                        <?php set_query_var('ic', $ic); ?>
                        <?php get_template_part('template-parts/02_molecules/cards/m-information-card'); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>