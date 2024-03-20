<?php

/**
 * File w/ supportive functions
 */

function get_the_post_custom_thumbnail($post_id, $size = 'featured-large', $additional_attributes = [])
{
    $custom_thumbnails = [];

    if ($post_id === null) {
        $post_id = get_the_ID();
    }

    if (has_post_thumbnail($post_id)) {
        $default_attributes = [
            'loading' => 'lazy',

        ];
        $attributes = array_merge($additional_attributes, $default_attributes);

        $custom_thumbnails = wp_get_attachment_image(
            get_post_thumbnail_id($post_id),
            $size,
            false,
            $additional_attributes
        );
    }

    return $custom_thumbnails;
}

function the_post_custom_thumbnail($post_id, $size = 'featured-thumbnail', $additional_attributes = [])
{
    echo get_the_post_custom_thumbnail($post_id, $size, $additional_attributes);
}

function cook_posted_on()
{
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    // Post is modified
    if (get_the_time(get_the_time('U') !== get_the_modified_time('U'))) {
        $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>
                        <time class="updated" datetime="%3$s">%4$s</time>';
    }

    $time_string = sprintf(
        $time_string,
        esc_attr(get_the_date(DATE_W3C)),
        esc_attr(get_the_date()),
        esc_attr(get_the_modified_date(DATE_W3C)),
        esc_attr(get_the_modified_date()),
    );

    $posted_on = sprintf(
        // esc_html_x func for help w/ translation + safe use HTML
        esc_html_x('Posted on %s', 'post date', 'cook-adv'),
        '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
    );

    echo '<span class="posted-one text-secondary">' . $posted_on . '</span>';
}

function cook_posted_by()
{
    $byline = sprintf(
        esc_html_x(' by %s', 'post author', 'cook-adv'),
        '<span class="author vcard"><a class="text-decoration-none" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
    );

    echo '<span class="byline text-secondary">' . $byline . '</span>';
}

function cook_the_excerpt($trim_character_count = 0)
{
    if (!has_excerpt() || $trim_character_count === 0) {
        the_excerpt();
        return;
    }

    $excerpt = wp_strip_all_tags(get_the_excerpt());
    $excerpt = substr($excerpt, 0, $trim_character_count);
    $excerpt = substr($excerpt, 0, strrpos($excerpt, ' '));

    echo $excerpt . cook_excerpt_more();
}

function cook_excerpt_more($more = '')
{
    if (!is_single()) {
        $more = sprintf(
            '... <a class="cook-read-more text-dark" href="%1$s"><span class="mt-3">%2$s</span></a>',
            // current way next
            // get_permalink(get_the_ID());
            // custom way next(here can be a bug) !!!
            get_post_permalink(),
            __('[read more]', 'cook-adv')
        );
    }
    return $more;
}

function cook_pagination()
{
    $args = [
        'before_page_number' => '<span class="btn border border-secondary m-2">',
        'after_page_number' => '</span>'
    ];

    $allowed_tags = [
        'span' => [
            'class' => []
        ],
        'a' => [
            'class' => [],
            'href' => []
        ]
    ];
    if (paginate_links($args)) {
        printf(
            '<nav class="cook-pagination clearfix text-center">%s</nav>',
            wp_kses(paginate_links($args), $allowed_tags)
        );
    }
}