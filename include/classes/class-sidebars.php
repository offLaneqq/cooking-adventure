<?php

// 
// Theme Sidebars
// 

namespace COOK_THEME\Include;

use COOK_THEME\Include\Traits\Singleton;

class Sidebars
{
    use Singleton;

    protected function __construct()
    {
        // load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // Actions
        add_action('widgets_init', [$this, 'register_sidebars']);
    }

    public function register_sidebars()
    {
        register_sidebar(
            [
                'name' => __('Sidebar', 'cook-adv'),
                'id' => 'sidebar-1',
                'description' => __('Main sidebar', 'cook-adv'),
                'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_title">',
                'after_title' => '</h3>'
            ]
        );

        register_sidebar(
            [
                'name' => __('Footer', 'cook-adv'),
                'id' => 'sidebar-2',
                'description' => __('Footer sidebar', 'cook-adv'),
                'before_widget' => '<div id="%1$s" class="widget widget-footer cell column %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget_title">',
                'after_title' => '</h3>'
            ]
        );
    }
}
