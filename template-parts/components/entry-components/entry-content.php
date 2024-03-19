<?php

// Template for entry content

?>

<div class="entry-content" style="text-indent: 2rem; text-align: justify;">
    <?php
    if (is_single()) {
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading %s <span class="meta-nav">rarr;</span>', 'cook-adv'),
                    [
                        "span" => [
                            "class" => []
                        ]
                    ]
                ),
                the_title('<span class="screen-reader-text">"', '"</span>', false)
            )
        );
        // Pagination in single post(pages breaks in wp)
        wp_link_pages(
            [
                'before' => '<div class="page-links">' . esc_html__('Pages: ', 'cook'),
                'after' => '</div>'
            ]
        );
    } else {
        cook_the_excerpt(200);

    }
    ?>
</div>