<?php
// 
// Template for breakfasts
// 

include __DIR__."/template-parts/page-template/posts-template.php";

get_header();



// echo '<pre>';
// print_r($query->posts);
// wp_die();

posts_template("Dinner");

?>


<?php

get_footer();

?>