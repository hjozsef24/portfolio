<?php

if (class_exists("Yoast\WP\SEO\Presenters\Abstract_Indexable_Presenter")) {

    function seo_fix()
    {
        global $post;

        if ($post != null) {

            if (is_singular('publications-cpt')) {
                $og_image = get_field('main_image');
            }

            if ($og_image) {
                $image     = wp_get_attachment_image_src($og_image['ID'], "large");
                $image_url = $image[0];

                echo '<meta property="og:image" content="' . esc_url($image_url) . '" />';
                echo '<meta property="og:image:width" content="' . $image[1] . '">';
                echo '<meta property="og:image:height" content="' . $image[2] . '">';

                remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
                remove_action('wp_head', 'wp_oembed_add_host_js');
                remove_action('rest_api_init', 'wp_oembed_register_route');
                remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

                function remove_og_image_presenter($presenters)
                {

                    return array_map(function ($presenter) {

                        if (!($presenter instanceof Yoast\WP\SEO\Presenters\Open_Graph\Image_Presenter)) {

                            return $presenter;
                        }
                    }, $presenters);
                }

                add_action('wpseo_frontend_presenters', 'remove_og_image_presenter');

                function remove_twitter_image_presenter($presenters)
                {

                    return array_map(function ($presenter) {

                        if (!($presenter instanceof Yoast\WP\SEO\Presenters\Twitter\Image_Presenter)) {

                            return $presenter;
                        }
                    }, $presenters);
                }

                add_action('wpseo_frontend_presenters', 'remove_twitter_image_presenter');
                function remove_my_image_presenter($presenters)
                {

                    return array_map(function ($presenter) {

                        if (!($presenter instanceof My_OgImage_Presenter)) {

                            return $presenter;
                        }
                    }, $presenters);
                }

                add_action('wpseo_frontend_presenters', 'remove_my_image_presenter');
            }
        }
    }
}
