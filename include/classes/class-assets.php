<?php

/**
 * Register and enqueue styles & scripts
 */

namespace COOK_THEME\Include;

use COOK_THEME\Include\Traits\Singleton;

class Assets
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions
        add_action('wp_enqueue_scripts', [$this, 'set_styles']);
        add_action('wp_enqueue_scripts', [$this, 'set_scripts']);
    }

    public function set_styles()
    {
        // Register and enqueue styles
        wp_register_style('bootstrap', COOK_BUILD_LIB_URI . '/css/bootstrap.min.css', [], false);
        wp_register_style('cook-stylesheet', COOK_BUILD_CSS_URI . '/main.css', ['bootstrap'], @filemtime(COOK_BUILD_CSS_DIR_PATH . '/main.css'), 'all');

        wp_enqueue_style('cook-stylesheet');
        wp_enqueue_style('bootstrap');
    }

    public function set_scripts()
    {
        // Register and enqueue scripts
        wp_register_script('main', COOK_BUILD_JS_URI . '/main.js', ['jquery'], @filemtime(COOK_BUILD_JS_URI . '/main.js'), false);
        wp_register_script('bootstrap', COOK_BUILD_LIB_URI . '/js/bootstrap.min.js', ['jquery'], false, false);
        wp_register_script('author-js', COOK_BUILD_JS_URI . '/author.js', ['jquery'], filemtime(COOK_BUILD_JS_DIR_PATH . '/author.js'), true);

        wp_enqueue_script('main');
        wp_enqueue_script('bootstrap');
        if (is_author()) {
            wp_enqueue_script('author-js');
        }
    }
}
