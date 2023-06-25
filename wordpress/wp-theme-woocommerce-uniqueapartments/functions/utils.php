<?php

/* Function to allow SVGs upload */
function add_file_types_to_uploads($file_types)
{
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);

    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');


/* Function to get page URL */
function get_page_url($template_name)
{
    $pages = get_posts([
        'post_type' => 'page',
        'post_status' => 'publish',
        'meta_query' => [
            [
                'key' => '_wp_page_template',
                'value' => $template_name . '.php',
                'compare' => '=',
            ],
        ],
    ]);
    if (!empty($pages)) {
        foreach ($pages as $pages__value) {
            return get_permalink($pages__value->ID);
        }
    }
    return get_bloginfo('url');
}


/* Function to get the ID of a specific template. */
function get_template_id($template_name)
{
    // Get the pages that have the specified template
    $pages = get_pages(
        array(
            'hierarchical' => false, //only top level pages
            'meta_key'     => '_wp_page_template', //meta_key for page template
            'meta_value'   => $template_name, //value of the template name
        )
    );
    if ($pages) {
        //return the first page ID found
        $page_id = $pages[0]->ID;
        return $page_id;
    }
    //if no pages found with the template return null
    return null;
}


/*Function to get the link of a specific template.*/
function get_template_link($template_name)
{
    $page = get_pages(
        array(
            'hierarchical' => false,
            'meta_key' => '_wp_page_template',
            'meta_value' => $template_name,
        )
    );
    if ($page) {
        $page_id = $page[0]->ID;
        return get_permalink($page_id);
    }
}

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

/* Language selector for desktop */
function language_selector()
{
    $languages = icl_get_languages('skip_missing=0');
    $current_lang = apply_filters('wpml_current_language', NULL);
    $output = '';
    if (count($languages) > 1) {
        $output .= '<ul class="js-language-selector header--language-selector">';
        $output .= '<li class="active"><a href="#">' . $current_lang . '</a></li>';
        $output .= '<ul class="js-hidden-languages hidden-languages">';
        foreach ($languages as $l) {
            if ($l['active']) {
                continue;
            }
            $output .= '<li><a href="' . $l['url'] . '">' . $l['code'] . '</a></li>';
        }
        $output .= '</ul>';
        $output .= '</ul>';
    }
    return $output;
}


/* Custom pagination */
function custom_pagination($the_query)
{
    $big = 999999999;

    $pagination_args = array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $the_query->max_num_pages,
        'prev_text' => file_get_contents(ASSETS_URI_IMG_SVG . '/arrow-down.svg'),
        'next_text' => file_get_contents(ASSETS_URI_IMG_SVG . '/arrow-down.svg'),
        'end_size' => 1,
        'mid_size' => 2,
    );
    echo paginate_links($pagination_args);
}


/* Function to get all images from repeaters gallery */
function get_all_images_from_gallery($galleries){
    $images = [];

    foreach ($galleries as $gallery){
        array_push($images, $gallery['main_image']['url']);
        
        $gallery_images = $gallery['gallery_images'];
        foreach($gallery_images as $image){
            array_push($images, $image['url']);
        }
    }

    return $images;
}