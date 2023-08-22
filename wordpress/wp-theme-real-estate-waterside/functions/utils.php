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

function get_button($button, $style = 'primary')
{

    $blank = isset($button['target']) && $button['target'] === '_blank' ? 'target="_blank"' : "";

    return "<a class='btn btn--$style' href='" . $button['url'] . "' $blank>"  . $button['title'] . "</a>";
}

/* Language selector for desktop */
function language_selector()
{
    $languages = icl_get_languages('skip_missing=0');
    $current_lang = apply_filters('wpml_current_language', NULL);
    $output = '';
    if (count($languages) > 1) {
        $output .= '<ul class="js-dropdown-toggle header__language-selector">';
        $output .= '<li class="active"><a href="#">' . $current_lang . '</a></li>';
        $output .= '<ul class="js-selector-dropdown hidden-languages">';
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

/* Function to get content from a flexible content field */
function get_flexible_content($flexible_content = 'flexible_content')
{
    if (have_rows($flexible_content)) {
        while (have_rows($flexible_content)) {
            the_row();
            get_template_part('template-parts/03_organisms/o', get_row_layout());
        }
    }
}

/* Function to calculate reading time */
function estimated_reading_time($content)
{
    $word_count = str_word_count(strip_tags($content));
    $minutes = floor($word_count / 200);
    $seconds = floor($word_count % 200 / (200 / 60));
    $str_minutes = $minutes > 1 ? __("minutes", 'waterside') :  __("minute", 'waterside');
    $str_seconds = __("seconds", 'waterside');

    if ($minutes == 0) {
        return "{$seconds} {$str_seconds}";
    } else {
        return "{$minutes} {$str_minutes}";
    }
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
        'prev_text' => '<button type="button" class="btn btn--arrow btn--lighter-blue btn--pagination"><img src="' . ASSETS_URI_IMG_SVG .'/icon-arrow-secondary.svg" alt=""></button>',
        'next_text' => '<button type="button" class="btn btn--arrow btn--lighter-blue btn--pagination"><img src="' . ASSETS_URI_IMG_SVG .'/icon-arrow-secondary.svg" alt=""></button>',
        'end_size' => 1,
        'mid_size' => 2,
    );
    echo paginate_links($pagination_args);
}

function split_text($string, $num) {
    $length = strlen($string);
    $output[0] = substr($string, 0, $num);
    $output[1] = substr($string, $num, $length );
    return $output;
}