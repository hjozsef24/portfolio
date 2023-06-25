<?php

function getFilteredRecords()
{

    global $wpdb;
    $dbTable = SUBMITS_DATABASE_TABLE;

    $query = "SELECT * FROM {$dbTable} WHERE ";

    foreach (@$_POST['datas'] as $i) {
        $name = $i['name'];
        $value = rtrim($i['value']);

        if ($value) {
            if($name == 'cv'){
                $value = 1;
            }
            $query .= $name . ' ' . 'LIKE' . ' ' . '"%' . $value . '%" AND' . ' ';
        }
    }

    
    $query = substr($query, 0, -4);

    $results = $wpdb->get_results($query);

    $filteredDataTable = createDataTableInner($results); 

    echo json_encode($filteredDataTable);

    wp_die();
}
add_action("wp_ajax_getFilteredRecords", "getFilteredRecords");
add_action("wp_ajax_nopriv_getFilteredRecords", "getFilteredRecords");
