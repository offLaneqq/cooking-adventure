<?php

// Template for footer inside The Loop

$the_post_id = get_the_ID();
$article_terms = wp_get_post_terms($the_post_id, ['category', 'post_tag']);

if (empty($article_terms) || !is_array($article_terms)) {
    return;
}

?>

<div class="entry-footer mt-4">
    <?php

    foreach ($article_terms as $key => $article_term) {
    ?>
        <button class="btn border border-secondary mb-2 mr-2 category-btn">
            <a class="entry-footer-link category-link" href="<?php echo esc_url(get_term_link($article_term)) ?>">
                <?php echo esc_html($article_term->name); ?>
            </a>
        </button>
    <?php
    }
    ?>
</div>