<?php

function create_submit_database_table()
{
    global $wpdb;
    require_once ABSPATH . 'wp-admin/includes/upgrade.php';

    $dbTable = SUBMITS_DATABASE_TABLE;
    $charsetCollate = $wpdb->get_charset_collate();

    $sql = 
    "CREATE TABLE 
        $dbTable (
            id smallint NOT NULL AUTO_INCREMENT PRIMARY KEY,
            submit_time datetime DEFAULT CURRENT_TIMESTAMP,
            name varchar(127) CHARACTER SET utf8, 
            company_name varchar(127) CHARACTER SET utf8,
            email varchar(127) CHARACTER SET utf8,
            phone longtext CHARACTER SET utf8,
            message longtext CHARACTER SET utf8,
            cv BOOL,
            gdpr BOOL
        ) $charsetCollate;";

    maybe_create_table($dbTable, $sql);
}

add_action('init', 'create_submit_database_table');