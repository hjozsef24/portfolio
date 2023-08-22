<?php
/* Helper function to check if apartment exists in database by API ID */
function get_apartment_status_by_id($id)
{
    global $wpdb;

    $result = $wpdb->get_results("SELECT * FROM `wp_postmeta` WHERE `meta_key` = 'api_flat_id' AND `meta_value` = $id", ARRAY_A);

    return $result;
}

/* Helper function to get the post ID of existing Apartment by API ID */
function get_apartment_post_id($id)
{

    global $wpdb;

    $post_id = $wpdb->get_results("SELECT post_id FROM `wp_postmeta` WHERE `meta_key` = 'api_flat_id' AND `meta_value` = $id", ARRAY_A);
    $post_id = $post_id[0]['post_id'];

    return $post_id;
}

/* Helper function to get the Apartment Title from the API */
function get_apartment_api_title($attribute_list)
{
    foreach ($attribute_list as $al) {
        $al_array = get_object_vars($al->attributes());
        foreach ($al_array as $a) {
            if ($a['key'] == 'flat_internal_id') {
                $title = $a['value'];
            }
        }
    }

    return $title;
}

/* Helper function to create a new Apartment */
function create_new_apartment($attribute_list, $flat_id, $currency, $building, $floor)
{
    $title = get_apartment_api_title($attribute_list);
    $new = array(
        'post_title'  => $title,
        'post_status' => 'publish',
        'post_type'   => 'apartments-cpt',
    );

    if (!post_exists($title)) {
        $post_id = wp_insert_post($new);
    }

    add_post_meta($post_id, 'api_flat_id', $flat_id);
    add_post_meta($post_id, 'api_currency', $currency);
    add_post_meta($post_id, 'api_building', $building);
    add_post_meta($post_id, 'api_floor', $floor);

    foreach ($attribute_list as $al) {
        $al_array = get_object_vars($al->attributes());
        foreach ($al_array as $a) {
            $meta_key = 'api_' . $a['key'];
            $meta_value = $a['value'];
            add_post_meta($post_id, $meta_key, $meta_value);
        }
    }
}

/* Helper function to update an existing Apartment */
function update_existing_apartment($attribute_list, $flat_id, $currency, $building, $floor)
{
    $post_id = get_apartment_post_id($flat_id);

    update_post_meta($post_id, 'api_currency', $currency);
    update_post_meta($post_id, 'api_building', $building);
    update_post_meta($post_id, 'api_floor', $floor);

    foreach ($attribute_list as $al) {
        $al_array = get_object_vars($al->attributes());
        foreach ($al_array as $a) {
            $meta_key = 'api_' . $a['key'];
            $meta_value = $a['value'];
            update_post_meta($post_id, $meta_key, $meta_value);
        }
    }
}

/* Main function to get API's data and create or update apartment in database */
function fetch_apartments_data()
{
    $url = 'https://cms.realpad.eu/ws/v10/get-project';
    $data = array(
        'login' => 'api-login',
        'password' => 'api-password',
        'screenid' => '1234',
        'developerid' => '1234',
        'projectid' => '1234'
    );


    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    $result = curl_exec($ch);

    curl_close($ch);

    $objDomDocument = new DomDocument();

    $objDomDocument->loadXML($result);

    if ($result === false) {
        return;
    }

    $result = @simplexml_import_dom($objDomDocument);
    $projects = $result->children()->project;

    foreach ($projects as $project) {
        foreach ($project as $p) {
            $building = $p->attributes()->name;

            if ($building) {
                $building = get_object_vars($building);
                $building = $building[0];
            } else {
                $building = false;
            }

            foreach ($p->floor as $flo) {
                $floor = $flo->attributes()->floorNo;

                if ($floor) {
                    $floor = get_object_vars($floor);
                    $floor = $floor[0];
                } else {
                    $floor = false;
                }

                foreach ($flo->flat as $f) {

                    $flat = get_object_vars($f);
                    $flat_id = $flat['@attributes']['id'];
                    $flat_attributes = $flat['flat-attribute'];
                    $currency = $project->attributes()->currency;
                    $currency = get_object_vars($currency);
                    $currency = $currency[0];

                    $flat_status = get_apartment_status_by_id($flat_id);

                    if (empty($flat_status)) {
                        create_new_apartment($flat_attributes, $flat_id, $currency, $building, $floor);
                    } else {
                        update_existing_apartment($flat_attributes, $flat_id, $currency, $building, $floor);
                    }
                }
            }
        }
    }
}

add_action('admin_init', 'fetch_apartments_data');