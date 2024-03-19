<?php
$mall_subtitle = $args['mall_subtitle'];
$mall_contacts = $args['mall_contacts'];
$conference_subtitle = $args['conference_subtitle'];
$conference_contacts = $args['conference_contacts'];

$contact_column_args = compact('mall_subtitle', 'mall_contacts', 'conference_subtitle', 'conference_contacts');
?>

<div class="contact__inner">
    <?php get_template_part('template-parts/02_molecules/m-contact-column', '', $contact_column_args); ?>
</div>