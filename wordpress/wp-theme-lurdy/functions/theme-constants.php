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