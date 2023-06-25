<?php /* Template name: Template: Get In Touch */ ?>

<?php get_header(); ?>

<?php $title = get_the_title(); ?>
<?php $text = get_field('main_text'); ?>
<?php $contact_text = get_field('contact_text'); ?>
<?php $gdpr = get_field('gdpr'); ?>
<?php $succcess_form_submit_text = get_field('succcess_form_submit_text'); ?>
<?php $subject_id = $_GET['id']; ?>

<?php set_query_var('title', $title); ?>
<?php set_query_var('text', $text); ?>
<?php get_template_part('template-parts/03_organisms/o-text'); ?>


<section class="page--get-in-touch">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-md-6 col-12">
                <?php if ($contact_text && $subject_id) : ?>
                    <?php $subject_title = get_the_title($subject_id); ?>
                    <?php $subject_url = get_the_permalink($subject_id); ?>
                    <?php $topic = "<a href=" . $subject_url . ">" . $subject_title . "</a>"; ?>

                    <?php $subject = $contact_text . " " . "<a href=" . $subject_url . ">" . $subject_title . "</a>"; ?>

                    <p class="js-contact-subject contact-subject"><?php echo $subject; ?></p>
                <?php endif; ?>

                <?php set_query_var('gdpr', $gdpr); ?>
                <?php set_query_var('topic', $topic); ?>
                <?php get_template_part('template-parts/03_organisms/o-form-get-in-touch'); ?>

                <?php if ($succcess_form_submit_text) : ?>
                    <div class="js-success-form-submit-text success-form-submit-text">
                        <?php echo $succcess_form_submit_text; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>