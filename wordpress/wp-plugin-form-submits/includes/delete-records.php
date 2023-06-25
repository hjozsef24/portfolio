<?php

function deleteRecords()
{

    global $wpdb;
    $dbTable = SUBMITS_DATABASE_TABLE;

    $query = "DELETE FROM {$dbTable}";
    $wpdb->get_results($query);

    wp_die();
}
add_action("wp_ajax_deleteRecords", "deleteRecords");
add_action("wp_ajax_nopriv_deleteRecords", "deleteRecords");
