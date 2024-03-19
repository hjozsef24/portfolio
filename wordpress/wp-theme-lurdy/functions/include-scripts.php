<?php
if (!defined('ABSPATH')) {
	exit;
}

// Define dist directory, base uri, and path
define('DIST_DIR', 'assets');
define('DIST_URI', get_template_directory_uri() . '/' . DIST_DIR);
define('DIST_PATH', get_template_directory() . '/' . DIST_DIR);

// default server address, port, and entry point can be customized in vite.config.js
define('VERSION', !empty($_SERVER['VERSION']) ? $_SERVER['VERSION'] : '0.1');
define('VITE_ENV', !empty($_SERVER['VITE_ENV']) ? $_SERVER['VITE_ENV'] : 'development');
define('VITE_SERVER', !empty($_SERVER['VITE_SERVER']) ? $_SERVER['VITE_SERVER'] : 'http://localhost:5173/');
define('VITE_ENTRY_POINT_JS', 'src/js/main.js');
define('VITE_ENTRY_POINT_SCSS', 'src/scss/styles.scss');

// enqueue hook
add_action('wp_enqueue_scripts', function () {

	wp_localize_script('main', "ajax", array(
		'ajaxurl' => admin_url('admin-ajax.php'),
		'themeurl' => get_template_directory_uri(),
		'baseurl' => site_url(),
	));

	wp_enqueue_style('font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&display=swap', array(), null);

	add_action('wp_head', function () {
		echo '<script> const ajax = {url: "' . admin_url('admin-ajax.php') . '"};</script>';
	});

	if (defined('VITE_ENV') && VITE_ENV === 'development') {
		function vite_head_module_hook()
		{
			echo '<script type="module" crossorigin src="' . VITE_SERVER . '@vite/client"></script>';
			echo '<script type="module" crossorigin src="' . VITE_SERVER . VITE_ENTRY_POINT_JS . '"></script>';
			echo '<style lang="scss">
            @import "' . VITE_SERVER . VITE_ENTRY_POINT_SCSS . '";
            </style>';
		}
		add_action('wp_head', 'vite_head_module_hook');
	} else {
		// Production version
		$manifest = json_decode(file_get_contents(DIST_PATH . '/manifest.json'), true);
		if (is_array($manifest)) {
			// CSS
			wp_enqueue_style('main', DIST_URI . '/' . $manifest['src/scss/styles.scss']['file'] . '?v=' . VERSION, array(), false, 'screen');

			// JS
			wp_enqueue_script('main', DIST_URI . '/' . $manifest['src/js/main.js']['file'] . '?v=' . VERSION, array(), false, true);
		}
	}
});