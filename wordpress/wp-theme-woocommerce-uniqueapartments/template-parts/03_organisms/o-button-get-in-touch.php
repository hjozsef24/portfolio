<?php $get_in_touch_template_url = get_template_link('template-get-in-touch.php'); ?>
<a href="<?php echo add_query_arg('id', $id, $get_in_touch_template_url); ?>" class="btn btn--primary">
    <?php _e('Get in touch', 'ua'); ?>
</a>