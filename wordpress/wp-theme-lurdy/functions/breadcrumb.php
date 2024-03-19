<?php
function generate_breadcrumb($full_width = false)
{
    get_template_part('template-parts/01_atoms/a-breadcrumb', '', compact('full_width'));
}

function custom_yoast_breadcrumb_separator($separator)
{
    $custom_separator = '<span class="separator">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M6.19461 11.8047C5.93426 11.5444 5.93426 11.1223 6.19461 10.8619L9.05654 8L6.19461 5.13807C5.93426 4.87772 5.93426 4.45561 6.19461 4.19526C6.45496 3.93491 6.87707 3.93491 7.13742 4.19526L10.4708 7.5286C10.7311 7.78894 10.7311 8.21106 10.4708 8.4714L7.13742 11.8047C6.87707 12.0651 6.45496 12.0651 6.19461 11.8047Z"
            fill="#2589BB" />
        </svg>
    </span>';
    return $custom_separator;
}
add_filter('wpseo_breadcrumb_separator', 'custom_yoast_breadcrumb_separator');

function add_extra_page_to_yoast_breadcrumb($links)
{
    if (is_singular('news-cpt') || is_singular('events-cpt')) {

        $news_template_url = get_template_link('template-news-events.php');
        $news_template_title = __('Hírek', 'lurdy');

        $news_template = array(
            array(
                'url' => $news_template_url,
                'text' => $news_template_title,
            ),
        );

        array_splice($links, 1, 0, $news_template);

        return $links;
    }
}
add_filter('wpseo_breadcrumb_links', 'add_extra_page_to_yoast_breadcrumb');
