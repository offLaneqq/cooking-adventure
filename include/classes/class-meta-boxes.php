<?php

/**
 * Register meta-boxes
 */

namespace COOK_THEME\Include;

use COOK_THEME\Include\Traits\Singleton;

class Meta_Boxes
{
    use Singleton;

    protected function __construct()
    {
        $this->setup_hooks();
    }

    protected function setup_hooks()
    {
        add_action('add_meta_boxes', [$this, 'add_custom_meta_boxes']);
        add_action('save_post', [$this, 'save_post_meta_data']);
    }

    public function add_custom_meta_boxes()
    {
        $screens = ['post'];
        foreach ($screens as $screen) {
            add_meta_box(
                'hide-page-title',
                __('Hide page title', 'cook-adv'),
                [$this, 'custom_meta_box_html'],
                $screen,
                'side'
            );
        }
    }

    public function custom_meta_box_html($post)
    {
        $value = get_post_meta($post->ID, '_hide_page_title', true);

        // Use Nonce for verificatiion
        wp_nonce_field(plugin_basename(__FILE__), 'hide_title_meta_box_nonce_name');
?>
        <label for="cook-field"><?php esc_html_e('Hide the page title', 'cook-adv'); ?></label>
        <select name="cook_hide_title_field" id="cook-field" class="postbox">
            <option value=""><?php esc_html_e('Select', 'cook-adv'); ?></option>
            <option value="yes" <?php selected($value, 'yes'); ?>>
                <?php esc_html_e('Yes', 'cook-adv'); ?>
            </option>
            <option value="no" <?php selected($value, 'no'); ?>>
                <?php esc_html_e('No', 'cook-adv'); ?>
            </option>
        </select>
<?php
    }

    public function save_post_meta_data($post_id)
    {
        if (!current_user_can('edit_posts', $post_id)) {
            return;
        }

        // Check if the same value we received is the same we created
        if (
            !isset($_POST['hide_title_meta_box_nonce_name'])
            || !wp_verify_nonce($_POST['hide_title_meta_box_nonce_name'], plugin_basename(__FILE__))
        ) {
            return;
        }

        if (array_key_exists("cook_hide_title_field", $_POST)) {
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['cook_hide_title_field']
            );
        }
    }
}
