<?php
$address = get_sub_field('address');
$address = $address ? $address : $args['address'];
$unique_id = uniqid();
$location = [];
$pin = asset('map-marker.svg', false, 'images/icons');


if ($address && isset($address['markers']) && count($address['markers']) > 0) {
    $location = array(
        'lat' => $address['markers'][0]['lat'],
        'lng' => $address['markers'][0]['lng']
    );
}
?>
<section class="section__simple-map">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-12">
                <?php if ($location) : ?>
                    <div class="js-simple-map simple-map" id="<?php echo $unique_id ?>" data-location='<?php echo json_encode($location); ?>' data-pin="<?php echo $pin; ?>"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php addScript('window.simpleMap();'); ?>