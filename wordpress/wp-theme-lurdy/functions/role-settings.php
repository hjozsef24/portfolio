<?php

/**
 * Add editors access to Yoast SEO plugin
 */
function edtior_access_to_wpseo_manage_options() {
	if (get_option('jh_editor_access_to_wpseo') != 'done') {
		$role_object = get_role('editor');
		$role_object->add_cap('wpseo_manage_options');
		$role_object->add_cap('wpseo_edit_advanced_metadata');
		update_option('jh_editor_access_to_wpseo', 'done');
	}
}
add_filter('admin_head', 'edtior_access_to_wpseo_manage_options');