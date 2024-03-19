<?php

// EXIT if access directly

use Dotenv\Dotenv;

if (!defined('ABSPATH')) {
    exit;
}

require_once 'vendor/autoload.php';

// load .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'functions/theme-constants.php';

require_once 'functions/load-post-types/load-news-events.php';
require_once 'functions/load-post-types/load-offers.php';
require_once 'functions/load-post-types/load-shops.php';

require_once 'functions/acf-manipulate-fields.php';
require_once 'functions/acf-options-page.php';
require_once 'functions/breadcrumb.php';
require_once 'functions/form-newsletter.php';
require_once 'functions/get-movies.php';
require_once 'functions/include-scripts.php';
require_once 'functions/nav-walker.php';
require_once 'functions/register-cpt.php';
require_once 'functions/role-settings.php';
require_once 'functions/shortcodes.php';
require_once 'functions/themeing-wp.php';
require_once 'functions/utils.php';


//Use Classic Editor instead of Guthenberg
add_filter('use_block_editor_for_post', '__return_false', 10);