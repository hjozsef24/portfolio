<?php
/* Define theme constants */

// Defines the website home page's URL
define('HOME_URL', esc_url(home_url()));

// Defines the WordPress installation directory's URL
define('SITE_URL', esc_url(site_url()));

// Defines the current theme's directory URL
define('THEME_URI', get_stylesheet_directory_uri());

// Defines the file path of the current theme's directory
define('THEME_PATH', get_stylesheet_directory_uri());

// Defines the URL of the favicon folder in the site's root directory
define('FAVICON_DIR', THEME_URI . '/favicon');

// Defines the URL of the assets folder within the theme directory
define('ASSETS_URI', THEME_PATH . '/assets');

// Defines the URL of the CSS folder within the assets directory
define('ASSETS_URI_CSS', ASSETS_URI . '/css');

// Defines the URL of the JS folder within the assets directory
define('ASSETS_URI_JS', ASSETS_URI . '/js');

// Defines the URL of the IMG folder within the assets directory
define('ASSETS_URI_IMG', ASSETS_URI . '/img');

// Defines the URL of the SVG folder within the IMG folder within the assets directory
define('ASSETS_URI_IMG_SVG', ASSETS_URI_IMG . '/svg');

// Defines the file path of the assets folder within the theme directory
define('ASSETS_PATH', THEME_PATH . '/assets');

// Defines the file path of the IMG folder within the assets directory
define('ASSETS_PATH_IMG', ASSETS_PATH . '/img');

// Defines the file path of the SVG folder within the IMG folder within the assets directory
define('ASSETS_PATH_IMG_SVG', ASSETS_PATH_IMG . '/svg');