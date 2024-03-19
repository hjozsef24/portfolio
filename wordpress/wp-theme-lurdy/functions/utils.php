<?php

$footer_script = [];

function asset($name, $read = false, $path = 'images')
{
    $file = false;
    if (defined('VITE_ENV') && VITE_ENV === 'development') {
        $file = '/src/assets/' . $path . '/' . $name;
    } else {
        $file = '/assets/' . $path . '/' . $name;
    }
    if ($read) {
        $file = file_get_contents(get_template_directory() . $file);
    } else {
        $file = get_template_directory_uri() . $file;
    }

    return $file;
}

function addScript($script)
{
    global $footer_script;
    $footer_script[] = $script;
}
function renderScript()
{
    global $footer_script;
    if (count($footer_script) > 0) {
        echo '<script>  window.addEventListener("load", (e) => {' . implode("\n\r", $footer_script) . '});</script>';
    }
}

/* Function to allow SVGs upload */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


function get_image_alt($image)
{
    $alt_text = "";
    if ($image['alt']) {
        $alt_text = $image['alt'];
    } else {
        $alt_text = $image['title'];
    }
    return $alt_text;
}


/* Function to get content from a flexible content field */
function get_flexible_content($flexible_content = 'flexible_content', $post_id = false, $folder = 'template-parts/03_organisms/o')
{
    if (have_rows($flexible_content, $post_id)) {
        while (have_rows($flexible_content, $post_id)) {
            the_row();
            get_template_part($folder, get_row_layout());
        }
    }
}


/* Language selector for desktop */
function get_language_selector()
{
    $languages = icl_get_languages('skip_missing=0');
    $current_lang = apply_filters('wpml_current_language', NULL);
    $output = '';
    if (count($languages) > 1) {
        $output .= '<div class="header__language-selector">';
        $output .= '<a href="#" class="current-language">' . $current_lang . '</a>';
        foreach ($languages as $l) {
            if ($l['active']) {
                continue;
            }
            $output .= '<a href="' . $l['url'] . '">' . $l['code'] . '</a>';
        }
        $output .= '</div>';
    }
    return $output;
}


function get_offer_details($post_id)
{

    if (get_post_type($post_id) !== 'offers-cpt') {
        return [];
    }

    $title = get_the_title($post_id);
    $permalink = get_the_permalink($post_id);
    $discount = get_field('discount', $post_id);
    $image = get_field('highlighted_image', $post_id);
    $description = get_field('description', $post_id);
    $map_link = get_field('map_link', $post_id);

    $offer_starts = get_field('offer_starts', $post_id);
    $offer_ends = get_field('offer_ends', $post_id);

    $date = ($offer_starts && $offer_ends) ? $offer_starts . '-' . $offer_ends : ($offer_starts ? __('Érvényesség kezdete', 'lurdy') . ': ' . $offer_starts : false);

    $original_price = get_field('original_price', $post_id);
    $discounted_price = get_field('discounted_price', $post_id);

    $related_shop = get_field('related_shop', $post_id);

    $related_shop = $related_shop ? [
        'name' => $related_shop[0]->post_title,
        'permalink' => get_the_permalink($related_shop[0]->ID)
    ] : false;

    return [
        'title' => $title,
        'permalink' => $permalink,
        'discount' => $discount,
        'image' => $image,
        'date' => $date,
        'map_link' => $map_link,
        'description' => $description,
        'original_price' => $original_price,
        'discounted_price' => $discounted_price,
        'related_shop' => $related_shop
    ];
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
