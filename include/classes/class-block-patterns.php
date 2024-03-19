<?php

// 
// Block Patterns
// 

namespace COOK_THEME\Include;

use COOK_THEME\Include\Traits\Singleton as Singleton;

class Block_Patterns
{
    use Singleton;

    protected function __construct()
    {
        // load class
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        // actions
        add_action('init', [$this, 'register_block_patterns']);
        add_action('init', [$this, 'register_block_pattern_categories']);
    }

    public function register_block_patterns()
    {
        if (function_exists('register_block_pattern')) {

            $ingredients_content = $this->get_pattern_content('template-parts/patterns/ingredients');

            register_block_pattern(
                'cook/ingredients',
                [
                    'title' => __('Cook ingredients', 'cook-adv'),
                    'description' => __('List of ingredients', 'cook-adv'),
                    'categories' => ['ingredients'],
                    'content' => $ingredients_content
                ]
            );
        }
    }

    public function get_pattern_content($template_part)
    {
        // Function get_template_part echo data. 
        // To resolve this call ob_start to don't go to echo out. 
        // Variable cover_content save data about code of pattern(template-parts/patterns/cover.php)
        // Also after call ob_end_clear()
        ob_start();

        get_template_part($template_part);
        $pattern_content = ob_get_contents();

        ob_end_clean();

        return $pattern_content;
    }

    public function register_block_pattern_categories()
    {
        $pattern_categories = [
            'ingredients' => __('Ingredients', 'cook-adv'),
            // 'carousel' => __('Carousel', 'cook-adv')
        ];

        if (!empty($pattern_categories) && is_array($pattern_categories)) {
            foreach ($pattern_categories as $pattern_category => $pattern_category_label) {
                register_block_pattern_category(
                    $pattern_category,
                    ['label' => $pattern_category_label]
                );
            }
        }
    }
}
