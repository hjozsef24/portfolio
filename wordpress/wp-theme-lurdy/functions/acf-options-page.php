<?php

if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title' => 'Általános beállítások',
		'menu_title' => 'Általános beállítások',
		'menu_slug' => 'theme_settings',
		'capability' => 'edit_posts',
		'position' => 35,
		'redirect' => false
	));
}