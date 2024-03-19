<?php
// 
// Template for breakfasts
// 

include __DIR__."/template-parts/page-template/posts-template.php";

get_header();

$args = [
    // 'posts_per_page' => 5, /* how many post you need to display */
    'offset' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post', /* your post type name */
    'post_status' => 'publish'
];
$query = new WP_Query($args);

// echo '<pre>';
// print_r($query->posts);
// wp_die();

posts_template("Breakfast");

?>



<?php

get_footer();

?>