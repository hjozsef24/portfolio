<?php
/* 
Processing ACF groups from acf-export.json file. 
Compares the contents of existing JSON files corresponding to the groups with those in the read file, 
updates the "modified" timestamp in the group if they are different, and re-writes the corresponding JSON files.
It keeps track of changes made to the groups managed by ACF.
*/

date_default_timezone_set('UTC');

$groups = json_decode(file_get_contents(dirname(__FILE__) . "/acf-export.json"), true);

foreach ($groups as $onegroup) {
    $current_content = json_encode(json_decode(file_get_contents(dirname(__FILE__) . "/acf-json/" . $onegroup['key'] . ".json"), true));
    if ($current_content !== json_encode($onegroup)) {
        echo ("Modified group: " . $onegroup['title'] . "\n");
        $onegroup['modified'] = (int)date('U');
        file_put_contents(dirname(__FILE__) . "/acf-json/" . $onegroup['key'] . ".json", json_encode($onegroup, JSON_PRETTY_PRINT));
    }
}

die("ACF-json export created.\n");