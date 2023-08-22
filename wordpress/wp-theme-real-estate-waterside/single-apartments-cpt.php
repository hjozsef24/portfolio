<?php get_header(); ?>

<?php /* Declare main variables */ ?>
<?php $id = get_the_ID(); ?>
<?php $title = get_the_title(); ?>
<?php $information_cards = get_field('information_cards'); ?>
<?php $similar_apartments = get_field('similar_apartments'); ?>
<?php $file_to_download = get_field('file_to_download'); ?>
<?php $extra_attributes = get_field('extra_attributes'); ?>
<?php $apartment_data  = get_apartment_data($id); ?>
<?php $availability = $apartment_data['flat_status'] ? __('Available', 'waterside') : __('Not available', 'waterside'); ?>

<?php /* Declare apartment's data variables */ ?>
<?php $flat_area = $apartment_data['flat_area']; ?>
<?php $flat_area_living = $apartment_data['flat_area_living']; ?>
<?php $flat_area_balcony = $apartment_data['flat_area_balcony']; ?>
<?php $flat_area_terrace = $apartment_data['flat_area_terrace']; ?>
<?php $flat_area_loggia = $apartment_data['flat_area_loggia']; ?>
<?php $flat_area_garden = $apartment_data['flat_area_garden']; ?>
<?php $flat_price = $apartment_data['flat_price']; ?>
<?php $flat_price_without_vat = $apartment_data['flat_price_without_vat']; ?>
<?php $flat_orientation = $apartment_data['flat_orientation']; ?>
<?php $flat_type = $apartment_data['flat_type']; ?>
<?php $flat_type = $apartment_data['flat_type']; ?>
<?php $flat_type = get_apartment_type($flat_type); ?>
<?php $floor = $apartment_data['floor']; ?>
<?php $building = $apartment_data['building']; ?>
<?php $currency = $apartment_data['currency']; ?>

<main class="template template--single-apartments">
    <section class="section__apartment__main-information">
        <div class="container-fluid">
            <div class="row justify-content-xxl-center">
                <div class="col-xl-4 col-12">
                    <h6 class="section__apartment__available">
                        <?php echo $availability; ?>
                    </h6>

                    <h4 class="section__apartment__apartment-title"><?php echo $title; ?></h4>

                    <div class="d-xl-none d-flex justify-content-center">
                        <?php set_query_var('id', $id); ?>
                        <?php get_template_part('template-parts/03_organisms/o-image-switcher'); ?>
                    </div>

                    <?php if ($flat_area) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Gross area', 'waterside'); ?></h6>
                            <h6><?php echo $flat_area; ?> m<sup>2</sup></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_area_living) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Living area', 'waterside'); ?></h6>
                            <h6><?php echo $flat_area_living; ?> m<sup>2</sup></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_area_balcony) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Balcony', 'waterside'); ?></h6>
                            <h6><?php echo $flat_area_balcony; ?> m<sup>2</sup></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_area_terrace) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Terrace', 'waterside'); ?></h6>
                            <h6><?php echo $flat_area_terrace; ?> m<sup>2</sup></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_area_loggia) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Loggia', 'waterside'); ?></h6>
                            <h6><?php echo $flat_area_loggia; ?> m<sup>2</sup></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_area_garden) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Garden', 'waterside'); ?></h6>
                            <h6><?php echo $flat_area_garden; ?> m<sup>2</sup></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_price) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Price', 'waterside'); ?></h6>
                            <h6><?php echo $flat_price . ' ' . $currency; ?></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_price_without_vat) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Price without VAT', 'waterside'); ?></h6>
                            <h6><?php echo $flat_price_without_vat . ' ' . $currency; ?></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_orientation) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Orientation', 'waterside'); ?></h6>
                            <h6><?php echo $flat_orientation; ?></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($flat_type) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Type', 'waterside'); ?></h6>
                            <h6><?php echo $flat_type; ?></h6>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($floor) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Floor', 'waterside'); ?></h6>
                            <h6><?php echo $floor; ?></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($building) : ?>
                        <div class="section__apartment__attribute">
                            <h6><?php _e('Building', 'waterside'); ?></h6>
                            <h6><?php echo $building; ?></h6>
                        </div>
                    <?php endif; ?>

                    <?php if ($extra_attributes) : ?>
                        <?php foreach ($extra_attributes as $i => $at) : ?>
                            <div class="section__apartment__attribute">
                                <h6><?php echo $at['name']; ?></h6>
                                <h6><?php echo $at['value']; ?></h6>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <div class="section__apartment__request-more">
                        <button type="button" class="btn btn--primary btn--lighter-blue js-open-request-modal" data-id="<?php echo $id; ?>">
                            <?php _e('Érdekel', 'waterside') ?>
                        </button>

                        <?php if ($file_to_download) : ?>
                            <a href="<?php echo $file_to_download; ?>" download class="download-file">
                                <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-pdf.svg" alt="">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="offset-xl-1 col-5 d-xl-flex d-none">
                    <?php set_query_var('id', $id); ?>
                    <?php get_template_part('template-parts/03_organisms/o-image-switcher'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php if ($information_cards) : ?>
        <?php set_query_var('information_cards', $information_cards); ?>
        <?php get_template_part('template-parts/03_organisms/o-information-card'); ?>
    <?php endif; ?>

    <?php if ($similar_apartments) : ?>
        <section class="section__similar-apartments section__apartment-cards">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section__similar-apartments__title font-size-94"><?php _e('Similar apartments', 'waterside'); ?></h2>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($similar_apartments as $id) : ?>
                        <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                            <?php set_query_var('id', $id); ?>
                            <?php get_template_part('template-parts/02_molecules/cards/m-apartment-card'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php get_template_part('template-parts/03_organisms/o-technical-description'); ?>

    <?php //get_template_part('template-parts/03_organisms/o-contacts'); ?>

    <?php set_query_var('apartment_id', $id); ?>
    <?php get_template_part('template-parts/03_organisms/o-request-offer-modal'); ?>
</main>
<?php get_footer(); ?>