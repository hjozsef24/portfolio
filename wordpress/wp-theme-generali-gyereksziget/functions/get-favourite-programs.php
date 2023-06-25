<?php
function get_favourite_programs(){
    $programs = $_POST['data'];
    $response = '';

    foreach($programs as $program){
        ob_start();
        get_program_card($program);
        $program_card = ob_get_clean();
        $response .= '<div class="col-xxl-3 col-xl-4 col-md-6 col-12">' . $program_card . '</div>';
    }

    echo $response;
    wp_die();
}

add_action('wp_ajax_get_favourite_programs', 'get_favourite_programs');
add_action('wp_ajax_nopriv_get_favourite_programs', 'get_favourite_programs');