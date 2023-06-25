<?php /* Template name: Sablon: Profil */ ?>
<?php get_header(); ?>
<?php $account_script = get_field('account_script'); ?>
<?php if ($account_script) : ?>
    <?php echo $account_script ?>
<?php endif; ?>
<?php get_footer();
