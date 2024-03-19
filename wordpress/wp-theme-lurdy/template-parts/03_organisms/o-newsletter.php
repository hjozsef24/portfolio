<?php
$type = get_sub_field('type');
$background = get_sub_field('background');
$title = get_sub_field('title');
$list_id = get_sub_field('newsletter_list_id');
$description = get_sub_field('description');
$gdpr_checkbox_text = get_field('gdpr_checkbox_text', 'options');
$extra_gdpr_text = get_field('extra_gdpr_text', 'options');
$button_label = get_sub_field('button_label');
$button_label = $button_label ? $button_label : __('Feliratkozom');

$success_subscribe_title = get_field('success_subscribe_title', 'options');
$success_subscribe_message = get_field('success_subscribe_message', 'options');
$success_subscribe_button_label = get_field('success_subscribe_button_label', 'options');
$success_subscribe_button_label = $success_subscribe_button_label ? $success_subscribe_button_label : __('Rendben');

$success_subscribe_assets = [
    'title' => $success_subscribe_title,
    'message' => $success_subscribe_message,
    'button_label' => $success_subscribe_button_label
];

$newsletter_args = compact(
    'title',
    'description',
    'gdpr_checkbox_text',
    'extra_gdpr_text',
    'button_label',
    'list_id',
    'success_subscribe_assets'
);
?>

<section class="section__newsletter <?= $background == 'grey' ? 'background-grey' : 'background-white'; ?>">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xxl-10 col-12">
                <?php get_template_part('template-parts/02_molecules/newsletter/m-newsletter-' . $type, '', $newsletter_args); ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.submitNewsletterForm();'); ?>