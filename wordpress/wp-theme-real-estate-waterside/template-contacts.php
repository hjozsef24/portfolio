<?php /* Template name: Template: Contacts */ ?>
<?php get_header(); ?>
<?php $title = get_the_title(); ?>
<?php $text_block_title = get_field('text_block_title', 'options'); ?>
<?php $text_block = get_field('text_block', 'options'); ?>
<?php $contacts = get_field('contacts', 'options'); ?>
<?php $waterside_residence_location = get_field('waterside_residence_location', 'options'); ?>
<?php $waterside_residence_location_pin = get_field('waterside_residence_location_pin', 'options'); ?>
<?php
$team_members = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'team-cpt',
    'post_status' => 'publish',
));
?>

<main class="template template--contacts">
    <section class="section__contacts__title">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo $title; ?></h1>
                </div>
            </div>
        </div>
    </section>

    <section class="section__contacts section__contacts__content">
        <div class="container-fluid pe-xl-0">
            <div class="row">
                <div class="col-xl-6 col-12">
                    <?php if ($team_members) : ?>
                        <?php $last_item = array_key_last($team_members); ?>
                        <div class="team__wrapper">
                            <?php foreach ($team_members as $i => $tm) : ?>
                                <?php $divider = ($i + 1) % 2 != 0 ?>
                                <?php get_team_card($tm, $divider); ?>

                                <?php if ((($i + 1) % 2 == 0) && ($i !== $last_item)): ?>
                                    <div class="team-card__divider__bottom"></div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="offset-xl-1 col-xl-5 col-12">
                    <?php if ($waterside_residence_location) : ?>
                        <?php
                        $location = array(
                            'lat' => $waterside_residence_location['markers'][0]['lat'],
                            'lng' => $waterside_residence_location['markers'][0]['lng']
                        );
                        ?>
                        <div class="js-simple-map simple-map" id="map" data-location='<?php echo json_encode($location); ?>' data-pin="<?php echo $waterside_residence_location_pin ?: $waterside_residence_location_pin; ?>"></div>
                    <?php endif; ?>

                    <?php if ($text_block_title) : ?>
                        <p class="contacts__subtitle"><?php echo $text_block_title; ?></p>
                    <?php endif; ?>

                    <?php if ($text_block) : ?>
                        <div class="contacts__text-block__text"><?php echo $text_block; ?></div>
                    <?php endif; ?>

                    <?php if ($contacts) : ?>
                        <?php set_query_var('contacts', $contacts); ?>
                        <?php get_template_part('template-parts/02_molecules/m-contact-details'); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>