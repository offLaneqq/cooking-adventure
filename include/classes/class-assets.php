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
        wp_register_style('cook-stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));
        wp_register_style('bootstrap', get_template_directory_uri() . '/assets/src/library/css/bootstrap.min.css', [], false);

        wp_enqueue_style('cook-stylesheet');
        wp_enqueue_style('bootstrap');
    }

    public function set_scripts()
    {
        // Register and enqueue scripts
        wp_register_script('main', get_template_directory_uri() . '/assets/src/js/main.js', ['jquery'], filemtime(get_template_directory() . '/assets/src/js/main.js'), false);
        wp_register_script('bootstrap', get_template_directory_uri() . '/assets/src/library/js/bootstrap.min.js', ['jquery'], false, false);

        wp_enqueue_script('main');
        wp_enqueue_script('bootstrap');
    }
}
