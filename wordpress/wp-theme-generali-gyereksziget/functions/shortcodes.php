<?php

class Shortcode_Builder
{
    private static $instance = null;

    public static function get_instance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function init()
    {
        add_action('admin_init', array($this, 'init_plugin'), 20);

        add_shortcode('youtube_shortcode', array($this, 'youtube_shortcode'));
        add_shortcode('image_shortcode', array($this, 'image_shortcode'));
        add_shortcode('button_shortcode', array($this, 'button_shortcode'));
    }

    public function init_plugin()
    {
        if (current_user_can('edit_posts') || current_user_can('edit_pages')) {
            add_action('print_media_templates', array($this, 'print_media_templates'));
            add_action('admin_head', array($this, 'admin_head'));
            add_action('wp_ajax_custom_shortcodes_buttons', array($this, 'wp_ajax_custom_shortcodes_buttons'));

            add_filter("mce_external_plugins", array($this, 'mce_plugin'));
            add_filter("mce_buttons", array($this, 'mce_button'));
        }
    }
    
    // Frontend short code displaying

    // Youtube shortcode
    public function youtube_shortcode($atts = array(), $innercontent = '', $code = '')
    {
        $sc_atts = shortcode_atts(
            array(
                'id' => '',
                'src' => '',
                'alt' => '',
                'text' => '',
            ),
            $atts
        );

        $sc_atts = (object)$sc_atts;
        ob_start();
        set_query_var('sc_atts', $sc_atts);
        get_template_part('functions/partials/youtube-shortcode-view');
        return ob_get_clean();
    }
    
    // Image shortcode
    public function image_shortcode($atts = array(), $innercontent = '', $code = '')
    {
        $sc_atts = shortcode_atts(
            array(
                'src' => '',
                'alt' => '',
            ),
            $atts
        );

        $sc_atts = (object)$sc_atts;
        ob_start();
        set_query_var('sc_atts', $sc_atts);
        get_template_part('functions/partials/image-shortcode-view');
        return ob_get_clean();
    }

    //Button shortcode
    public function button_shortcode($atts = array(), $innercontent = '', $code = '')
    {
        $sc_atts = shortcode_atts(
            array(
                'button_target' => '',
                'title' => '',
                'link' => '',
                'center' => '',
            ),
            $atts
        );

        $sc_atts = (object)$sc_atts;
        ob_start();
        set_query_var('sc_atts', $sc_atts);
        get_template_part('functions/partials/button-shortcode-view');
        return ob_get_clean();
    }


    // Register shortcode buttons script
    public function mce_plugin($plugin_array)
    {
        $plugin_array['custom_shortcodes'] = get_template_directory_uri() . '/assets/js/extra/shortcode/shortcodes-inline.js';
        return $plugin_array;
    }

    // Register shortcode button
    public function mce_button($buttons)
    {
        array_push($buttons, 'custom_shortcodes_buttons');
        return $buttons;
    }
    
    // Outputs the view inside the wordpress editor.
    public function print_media_templates()
    {
        $current_screen = get_current_screen();
        $allowed_screens = array('post', 'toplevel_page_page_settings');


        if (!isset($current_screen->id) || !in_array($current_screen->base, $allowed_screens)) {
            return;
        }

        require_once 'partials/tmpl-image-shortcode.php';
        require_once 'partials/tmpl-youtube-shortcode.php';
        require_once 'partials/tmpl-button-shortcode.php';
    }

    // Enqueueing shortcode editor view
    public function admin_head()
    {
        $current_screen = get_current_screen();
        $allowed_screens = array('post', 'toplevel_page_page_settings');

        if (!isset($current_screen->id) || !in_array($current_screen->base, $allowed_screens)) {
            return;
        }

        wp_enqueue_script('shortcodes-editor-view', get_template_directory_uri() . '/assets/js/extra/shortcode/shortcodes-editor-view.js', array('shortcode', 'wp-util', 'jquery','media-views'), false, true);
    }
}

Shortcode_Builder::get_instance()->init();