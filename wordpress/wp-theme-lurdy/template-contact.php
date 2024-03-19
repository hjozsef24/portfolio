<?php
// Template name: Sablon: Kapcsolat

get_header();

$title = get_the_title();
$address = get_field('address');
$opening_hours = get_field('opening_hours');

$field_names = array(
    'mall_subtitle',
    'mall_contacts',
    'conference_subtitle',
    'conference_contacts',
);

$contact_inner_args = array();

foreach ($field_names as $field_name) {
    $contact_inner_args[$field_name] = get_field($field_name);
}
?>

<main class="template template--contact">
    <div class="main__content">
        <section class="section__contact">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-12">
                        <h1><?= $title; ?></h1>
                        <?php get_template_part('template-parts/03_organisms/contact/o-contact-inner', '', $contact_inner_args); ?>
                    </div>
                </div>
            </div>
        </section>

        <?php get_template_part('template-parts/03_organisms/o-simple-map', '', compact('address')); ?>
    </div>

    <?php
    get_template_part('template-parts/03_organisms/contact/o-contact-opening-hours', '', compact('opening_hours'));
    get_flexible_content();
    ?>

</main>

<?php get_footer(); ?>