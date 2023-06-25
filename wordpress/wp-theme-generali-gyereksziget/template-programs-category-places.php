<?php /* Template name: Sablon: Program helyszínek oldal */ ?>
<?php get_header(); ?>

<?php get_flexible_content(); ?>

<?php 
$terms = get_terms(
    'programs-category-places',
    array(
        'hide_empty' => true,
        'orderby'    => 'name', 
        'order'      => 'ASC',
        'offset'     => 0,
        'number'     => 16,
    )
); 
?>
<?php $additional_text = get_field('additional_text'); ?>

<section class="programs--category-places">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 col-12">
                <div class="subheader__wrapper">
                    <?php if ($additional_text) : ?>
                        <div class="text-block">
                            <?php echo $additional_text; ?>
                        </div>
                    <?php endif; ?>
                    <form class="js-search-places-form">
                        <div class="form-group">
                            <input class="js-live-search live-search" type="search" name="search" placeholder="<?php _e('Keresés névre, kategóriára'); ?>">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row js-load-more-places-container">
            <?php foreach ($terms as $term) : ?>
                <?php $term_id = $term->term_id; ?>

                <div class="col-xxl-3 col-xl-4 col-md-6 col-12 js-places">
                    <?php get_places_card($term_id, 'programs-category-places'); ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="row">
            <div class="col-12">
                <a class="js-load-more-places btn btn--centered">
                    <?php _e('Még több helyszín', 'gyereksziget'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>