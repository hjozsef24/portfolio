<?php $contact_text = get_field('contact_text', 'options'); ?>
<?php $footer_text = get_field('footer_text', 'options'); ?>
<?php $footer_contacts = get_field('footer_contacts', 'options'); ?>

<?php set_query_var('footer_contacts', $footer_contacts); ?>
<?php set_query_var('contact_text', $contact_text); ?>

<?php get_template_part('template-parts/contact'); ?>

<footer>
    <?php if ($footer_text) : ?>
        <?php echo $footer_text; ?>
    <?php endif; ?>
</footer>

<?php wp_footer(); ?>

</body>

</html>