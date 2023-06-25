<?php $furniture_packages_url = get_term_link('furniture-packages', 'product_cat'); ?>
<section class="highlighted-furniture-packages">
    <div class="container-fluid">
        <div class="row">
            <div class="offset-xxl-1 col-xxl-10 col-12">
                <h3 class="responsive-32"><?php _e('Furniture packages', 'ua'); ?></h3>
            </div>
        </div>

        <div class="row">
            <div class="offset-xxl-1 col-xxl-10 col-12">
                <div class="row js-highlighted-furniture-packages-slider highlighted-furniture-packages-slider">
                    <?php foreach ($furniture_packages as $i => $id) : ?>
                        <?php $last_item = array_key_last($developments); ?>
                        <div class="col-xxl-4 col-md-6 <?php echo $last_item == $i ? 'hidden-tablet' : ''; ?>">
                            <?php get_individual_product_card($id); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12">

                <a href="<?php echo $furniture_packages_url ; ?>" class="btn btn--primary btn--centered">
                    <?php _e('SHOW MORE', 'ua'); ?>
                </a>
            </div>
        </div>
    </div>
</section>