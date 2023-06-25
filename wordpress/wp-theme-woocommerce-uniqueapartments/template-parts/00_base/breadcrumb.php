<?php
if (function_exists('yoast_breadcrumb') && !is_front_page()) {
    yoast_breadcrumb('<div id="breadcrumbs">', '</div>');
}
