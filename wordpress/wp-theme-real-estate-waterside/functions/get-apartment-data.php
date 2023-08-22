<?php
function get_apartment_data($post_id)
{
    $apartment_data = [];

    $fields = [
        'flat_area',
        'flat_area_living',
        'flat_area_balcony',
        'flat_area_terrace',
        'flat_area_loggia',
        'flat_area_garden',
        'flat_price',
        'flat_price_without_vat',
        'flat_status',
        'flat_orientation',
        'flat_type',
        'building',
        'floor',
        'currency'
    ];

    $acf_datas = get_field('attributes', $post_id);

    foreach ($fields as $field) {
        if ($acf_datas['attr_' . $field]) {
            $apartment_data[$field] = $acf_datas['attr_' . $field];
        } else {
            $api_data = get_post_meta($post_id, 'api_' . $field);
            $apartment_data[$field] = $api_data[0];
        }
    }

    return $apartment_data;
}

function get_apartment_type($type)
{
    switch ($type) {
        case '1':
            $apartment_type = __('Flat', 'waterside');
            break;
        case '2':
            $apartment_type = __('Parking', 'waterside');
            break;
        case '3':
            $apartment_type = __('Cellar', 'waterside');
            break;
        case '4':
            $apartment_type = __('Outdoor Parking', 'waterside');
            break;
        case '5':
            $apartment_type = __('Garage', 'waterside');
            break;
        case '6':
            $apartment_type = __('Commercial Space', 'waterside');
            break;
        case '7':
            $apartment_type = __('Family House', 'waterside');
            break;
        case '8':
            $apartment_type = __('Land', 'waterside');
            break;
        case '9':
            $apartment_type = __('Atelier', 'waterside');
            break;
        case '10':
            $apartment_type = __('Office', 'waterside');
            break;
        case '11':
            $apartment_type = __('Art Workshop', 'waterside');
            break;
        case '12':
            $apartment_type = __('Motorbike parking', 'waterside');
            break;
        case '13':
            $apartment_type = __('Non-residental Unit', 'waterside');
            break;
        case '14':
            $apartment_type = __('Creative Workshop', 'waterside');
            break;
        case '15':
            $apartment_type = __('Townhouse', 'waterside');
            break;
        case '16':
            $apartment_type = __('Utility room', 'waterside');
            break;
        case '17':
            $apartment_type = __('Condominium', 'waterside');
            break;
        case '18':
            $apartment_type = __('Storage', 'waterside');
            break;
        case '19':
            $apartment_type = __('Apartment', 'waterside');
            break;
        case '20':
            $apartment_type = __('Accomodation unit', 'waterside');
            break;
        case '21':
            $apartment_type = __('Bike Stand', 'waterside');
            break;
        case '22':
            $apartment_type = __('Communal area', 'waterside');
            break;
        default:
            $apartment_type = __('Apartment', 'waterside');
            break;
    }

    return $apartment_type;
}
