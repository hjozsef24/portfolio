<?php $login_url = get_template_link('template-login.php'); ?>
<?php $profile_url = get_template_link('template-account.php'); ?>

<?php $redirect_to = is_user_logged_in() ? $profile_url : $login_url; ?>

<a href="<?php echo $redirect_to; ?>" class="header--secondary-navigation-logo profile--hidden">
    <img src="<?php echo ASSETS_URI_IMG_SVG; ?>/icon-profile.svg" alt="<?php _e('Profile', 'ua'); ?>">
    <p><?php _e('Login', 'ua'); ?></p>
</a>