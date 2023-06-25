<?php

function get_image_alt($image)
{
    $altText = "";

    if ($image['alt']) {
        $altText = $image['alt'];
    } else {
        $altText = $image['title'];
    }

    return $altText;
}

function get_template_link($template_name)
{
    $page = get_pages(
        array(
            'hierarchical' => false,
            'meta_key'     => '_wp_page_template',
            'meta_value'   => $template_name,
        )
    );
    if ($page) {
        $page_id = $page[0]->ID;
        return get_permalink($page_id);
    }

}
