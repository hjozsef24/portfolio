<?php

function exportRecords()
{

    /*
    * Get the records to the CSV 
    */
    global $wpdb;
    $dbTable = SUBMITS_DATABASE_TABLE;

    $query = "SELECT * FROM {$dbTable} WHERE ";

    foreach (@$_POST['datas'] as $i) {
        $name = $i['name'];
        $value = rtrim($i['value']);

        if ($value) {
            if ($name == 'cv') {
                $value = 1;
            }
            $query .= $name . ' ' . 'LIKE' . ' ' . '"%' . $value . '%" AND' . ' ';
        }
    }


    $query = substr($query, 0, -4);

    $results = $wpdb->get_results($query);


    /*
    * Create the CSV file
    */
    ob_start();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=incoming_messages.csv');

    $header = array(
        'ID',
        'Beküldés ideje',
        'Név',
        'Cégnév',
        'Email cím',
        'Telefonszám',
        'Üzenet',
        'CV',
        'GDPR'
    );

    ob_end_clean();

    $output = fopen('php://output', 'w');

    fputcsv($output, $header);

    foreach ($results as $result) {
        $result = (array) $result;
        fputcsv($output, $result);
    }

    fclose($output);
    wp_die();
}

add_action("wp_ajax_exportRecords", "exportRecords");
add_action("wp_ajax_nopriv_exportRecords", "exportRecords");
