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

    $year = get_the_date('Y');
    $month = get_the_date('n');
    $day = get_the_date('j');
    $post_date_archive_permalink = get_day_link($year, $month, $day);

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
        '<a href="' . esc_url($post_date_archive_permalink) . '" rel="bookmark">' . $time_string . '</a>'
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

/**
 * If the gravatar is uploaded returns true.
 *
 * There are two things we need to check, If user has uploaded the gravatar:
 * 1. from WP Dashboard, or
 * 2. or gravatar site.
 *
 * If any of the above condition is true, user has valid gravatar,
 * and the function will return true.
 *
 * 1. For Scenario 1: Upload from WP Dashboard:
 * We check if the query args is present or not.
 *
 * 2. For Scenario 2: Upload on Gravatar site:
 * When constructing the URL, use the parameter d=404.
 * This will cause Gravatar to return a 404 error rather than an image if the user hasn't set a picture.
 *
 * @param $user_email
 *
 * @return bool
 */
function cook_has_gravatar($user_email)
{

    $gravatar_url = get_avatar_url($user_email);
    if (cook_is_uploaded_via_wp_admin($gravatar_url)) {
        return true;
    }
    $gravatar_url = sprintf('%s&d=404', $gravatar_url);
    // Make a request to $gravatar_url and get the header
    $headers = @get_headers($gravatar_url);
    // If request status is 200, which means user has uploaded the avatar on gravatar site
    return preg_match("|200|", $headers[0]);
}

/**
 * Checks to see if the specified user id has a uploaded the image via wp_admin.
 *
 * @return bool  Whether or not the user has a gravatar
 */
function cook_is_uploaded_via_wp_admin($gravatar_url)
{
    $parsed_url = wp_parse_url($gravatar_url);
    $query_args = !empty($parsed_url['query']) ? $parsed_url['query'] : '';
    // If query args is empty means, user has uploaded gravatar.
    return empty($query_args);
}

/**
 * Display Post pagination with prev next, first last, to, from
 *
 * @param $current_page_no
 * @param $posts_per_page
 * @param $article_query
 * @param $first_page_url
 * @param $last_page_url
 * @param bool $is_query_param_structure
 */
function cook_the_post_pagination($current_page_no, $posts_per_page, $article_query, $first_page_url, $last_page_url, bool $is_query_param_structure = true)
{
    $prev_posts = ($current_page_no - 1) * $posts_per_page;
    $from = 1 + $prev_posts;
    $to = count($article_query->posts) + $prev_posts;
    $of = $article_query->found_posts;
    $total_pages = $article_query->max_num_pages;

    $base = !empty($is_query_param_structure) ? add_query_arg('page', '%#%') : get_pagenum_link(1) . '%_%';
    $format = !empty($is_query_param_structure) ? '?page=%#%' : 'page/%#%';

?>
    <div class="mt-0 md:mt-10 mb-10 lg:my-5 flex items-center justify-end posts-navigation">
        <?php
        if (1 < $total_pages && !empty($first_page_url)) {
            printf(
                '<span class="mr-2">Showing %1$s - %2$s Of %3$s</span>',
                $from,
                $to,
                $of
            );
        }


        // First Page
        if (1 !== $current_page_no && !empty($first_page_url)) {
            printf('<a class="first-pagination-link btn border border-secondary mr-2" href="%1$s" title="first-pagination-link">%2$s</a>', esc_url($first_page_url), __('First', 'cook-adv'));
        }

        echo paginate_links([
            'base' => $base,
            'format' => $format,
            'current' => $current_page_no,
            'total' => $total_pages,
            'prev_text' => __('Prev', 'aquila'),
            'next_text' => __('Next', 'aquila'),
        ]);

        // Last Page
        if ($current_page_no < $total_pages && !empty($last_page_url)) {

            printf('<a class="last-pagination-link btn border border-secondary ml-2" href="%1$s" title="last-pagination-link">%2$s</a>', esc_url($last_page_url), __('Last', 'cook-adv'));
        }

        ?>
    </div>
<?php
}
