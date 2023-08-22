<?php
function get_filter_params_from_url()
{
    $params = [];

    $area_min = $_GET['area-min'];
    $area_max = $_GET['area-max'];
    $rooms = $_GET['rooms'];
    $buildings = $_GET['building'];
    $floor_min = $_GET['floor-min'];
    $floor_max = $_GET['floor-max'];
    $balcony = $_GET['balcony'];
    $terrace = $_GET['terrace'];
    $innergarden = $_GET['innergarden'];
    $street = $_GET['street'];
    $parking = $_GET['parking'];
    $storage = $_GET['storage'];

    if ($area_min != '' && $area_max != '') {
        $params['default']['area'] = $area_min . ' - ' . $area_max . ' m<sup>2</sup>';
    } elseif ($area_min != '') {
        $params['default']['area'] = $area_min . ' m<sup>2</sup>';
    } elseif ($area_max != '') {
        $params['default']['area'] = $area_max . ' m<sup>2</sup>';
    }

    if ($rooms) {
        $params['default']['rooms'] = '';

        foreach ($rooms as $i => $room) {
            if ($i == array_key_last($rooms)) {
                $params['default']['rooms'] .= $room . ' ' . __('room', 'waterside');
            } else {
                $params['default']['rooms'] .= $room . ' - ';
            }
        }
    }

    if ($floor_min != '' && $floor_max != '') {
        $params['default']['floor'] = $floor_min . ' - ' . $floor_max . ' ' . __('floor', 'waterside');
    } elseif ($floor_min != '') {
        $params['default']['floor'] = $floor_min;
    } elseif ($floor_max != '') {
        $params['default']['floor'] = $floor_max;
    }

    if ($buildings) {
        $params['default']['building'] = '';

        foreach ($buildings as $i => $building) {
            if ($i == array_key_last($buildings)) {
                $params['default']['building'] .= $building . ' ' . __('building', 'waterside');
            } else {
                $params['default']['building'] .= $building . ', ';
            }
        }

    }

    if ($balcony == 'on') {
        $params['labeled']['balcony'] = 'Balcony';
    }

    if ($terrace == 'on') {
        $params['labeled']['terrace'] = 'Terrace';
    }

    if ($innergarden == 'on') {
        $params['labeled']['innergarden'] = 'Inner garden';
    }

    if ($street == 'on') {
        $params['labeled']['street'] = 'Street';
    }

    if ($parking == 'on') {
        $params['labeled']['parking'] = 'Parking';
    }
    
    if ($storage == 'on') {
        $params['labeled']['storage'] = 'Storage';
    }

    return $params;
}
