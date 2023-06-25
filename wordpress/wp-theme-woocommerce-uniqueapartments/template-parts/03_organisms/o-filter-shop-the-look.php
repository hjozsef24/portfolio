<section class="shop-the-look-filter">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-8 col-12">
                <h5><?php echo $filter_title; ?></h5>

                <div class="filter--shop-the-look">
                    <p class="js-shop-the-look-category shop-the-look-category" data-category="all">
                        <?php _e('All', 'ua'); ?>
                    </p>

                    <?php foreach ($categories as $category) : ?>
                        <?php $category_id = $category->term_id; ?>
                        <?php $category_name = $category->name; ?>

                        <p class="js-shop-the-look-category shop-the-look-category" data-category="<?php echo $category_id; ?>">
                            <?php echo $category_name; ?>
                        </p>
                    <?php endforeach; ?>
                    <div class="js-shop-the-look-category-pill shop-the-look-category-pill"></div>
                </div>

                <?php get_template_part('template-parts/02_molecules/m-filter-shop-the-look'); ?>
            </div>
        </div>
    </div>
</section>