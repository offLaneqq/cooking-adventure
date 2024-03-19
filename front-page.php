<?php

// 
// Front page template
// 

get_header();
$args = [
    'posts_per_page' => 5, /* how many post you need to display */
    'offset' => 0,
    'orderby' => 'post_date',
    'order' => 'DESC',
    'post_type' => 'post', /* your post type name */
    'post_status' => 'publish'
];
$query = new WP_Query($args);


// echo '<pre>';
// print_r($query->post_title);
// wp_die();


?>

<div id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <div class="home-page-wrap">
            <?php
            if ($query->have_posts()) : ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <?php
                        $index = 0;
                        $n_of_col = 3;
                        while ($query->have_posts()) :
                            $the_post_id = get_the_ID();
                            $has_post_thumbnail = get_the_post_thumbnail($the_post_id, [550, 300], ['class' => 'rounded-top w-100']);
                            if ($index % $n_of_col === 0) {
                        ?>
                                <div class="col-lg-6 col-sm-12">
                                <?php }
                            if ($has_post_thumbnail) {
                                ?>
                                    <div class="border border-dark mb-4 rounded front-img">
                                        <a href="<?php echo esc_url(get_permalink()); ?>" class="link-underline-dark">
                                            <?php echo $has_post_thumbnail; ?>
                                            <div class="text-light w-100" style="background-color: black">
                                                <p class="p-3 m-0 text-center"><?php echo get_the_title(); ?></p>
                                            </div>
                                        </a>
                                    </div>

                                <?php
                            }
                            $query->the_post();

                            $index++;

                            if ($index !== 0 && $index % $n_of_col === 0) {

                                ?>
                                </div>
                        <?php
                            }
                        endwhile ?>
                    </div>
                <?php
            else :
                get_template_part('template-parts/content-none');

            endif;
                ?>
                </div>
    </main>
</div>

<?php

get_footer();

?>