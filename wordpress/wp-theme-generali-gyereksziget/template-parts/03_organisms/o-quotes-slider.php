<?php $quote_title = get_sub_field('quotes_slider_title'); ?>
<?php $quote_post = get_sub_field('quotes_slider_quotes'); ?>

<section class="quotes-slider">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-9 col-12 offset-tablet-2 ">
                <?php set_query_var('quote_title', $quote_title); ?>
                <?php set_query_var('quote_post', $quote_post); ?>
                <?php get_template_part('template-parts/02_molecules/m-quotes-slider'); ?>
            </div>
        </div>
    </div>
</section>