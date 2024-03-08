<?php 
// 
// Template, when no post
// 
?>

<section class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title"><?php esc_html_e('Nothing Found.', 'cook-adv') ?></h1>
    </header>
    <div class="page-content">
        <?php 
            if(is_home() && current_user_can('publish_posts') ) {
                ?>
                <p><?php printf(
                    wp_kses(
                      __('Ready to publish your first post?<a href="%s">Get Started Here.</a>', 'aquila'),
                        [
                            'a' => [
                                'href' => []
                            ]
                        ]
                            ),
                            esc_url(admin_url('post-new.php'))
                    ) ?></p>
                <?php
            } elseif(is_search()) {
                ?>
                <p><?php esc_html_e('Sorry, but nothing matched with your search item. Please try again with some different keywords', 'aquila') ?></p>
                <?php
                get_search_form();
            } else {
                ?>
                <p><?php esc_html_e('It seems that we cannot find what are you looking for.', 'cook-adv') ?></p>
                <?php
                get_search_form();
            }
        ?>
    </div>
</section>