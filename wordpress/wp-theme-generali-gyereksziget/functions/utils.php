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


/* Language selector for desktop */
function language_selector()
{
    $languages = icl_get_languages('skip_missing=0');
    $current_lang = apply_filters('wpml_current_language', NULL);
    $output = '';
    if (count($languages) > 1) {
        $output .= '<ul class="language-selector js-language-selector">';
        $output .= '<li class="active"><a href="#">' . $current_lang . '</a></li>';
        $output .= '<ul class="language-selector--inactive__wrapper js-language-selector-inactive-wrapper">';
        foreach ($languages as $l) {
            if ($l['active']) {
                continue;
            }
            $output .= '<li><a href="' . $l['url'] . '">' . $l['native_name'] . '</a></li>';
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

/* Function to always get alt text from an ACF image array for an image tag */
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

/* Function to get a button with <a> tag */
function get_button($button, $style = 'primary')
{

    $blank = isset($button['target']) && $button['target'] === '_blank' ? 'target="_blank"' : "";

    return "<a class='btn btn--$style' href='" . $button['url'] . "' $blank>"  . $button['title'] . "</a>";
}


/* Function to calculate reading time */
function estimated_reading_time($content)
{
    $word_count = str_word_count(strip_tags($content));
    $minutes = floor($word_count / 200);
    $seconds = floor($word_count % 200 / (200 / 60));
    $str_minutes = __("perc", 'gyereksziget');
    $str_seconds = __("másodperc", 'gyereksziget');

    if ($minutes == 0) {
        return "{$seconds} {$str_seconds}";
    } else {
        return "{$minutes} {$str_minutes}";
    }
}

/* Function to concat strings from flexible content, used for estimated_reading_time() function */
function get_flexible_content_text($id)
{
    $text = '';
    $text .= get_the_title($id);


    if (have_rows('flexible_content', $id)) {
        while (have_rows('flexible_content', $id)) {
            the_row();
            if (get_row_layout() === 'image-text') {
                $text .= get_sub_field('image_text_text');
            } elseif (get_row_layout()   === 'text-block') {
                $text .= get_sub_field('text_block');
            } elseif (get_row_layout()   === 'highlighted-programs') {
                $text .= get_sub_field('highlighted_programs_text');
            } elseif (get_row_layout()   === 'highlighted-places') {
                $text .= get_sub_field('highlighted_places_text');
            } elseif (get_row_layout()   === 'highlighted-news') {
                $text .= get_sub_field('highlighted_news_textfield');
            } elseif (get_row_layout()   === 'hero') {

                $hero = get_sub_field('hero_slides');
                foreach ($hero as $h) {
                    $text .= $h['text'];
                }
            } elseif (get_row_layout()   === 'tabs') {
                $tab = get_sub_field('tabs');

                foreach ($tab as $t) {
                    $text .= $t['tab_title'] . $t['tab_subtitle'];
                    $tabs_content = $t['tabs_content'];

                    foreach ($tabs_content as $tc) {
                        $text .= $tc['image_title'] . $tc['text'];
                    }
                }
            }
        }
    }
    return $text;
}
