<?php
function getDatabaseRecords()
{
    global $wpdb;
    $dbTable = SUBMITS_DATABASE_TABLE;
    $results = $wpdb->get_results("SELECT * FROM {$dbTable}");

    return $results;
}
