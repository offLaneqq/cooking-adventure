<?php

function posts_template($category = "")
{
    $args = [
        // 'posts_per_page' => 5, /* how many post you need to display */
        'offset' => 0,
        'orderby' => 'post_date',
        // 'category_name' => 'soup',
        'order' => 'DESC',
        'post_type' => 'post', /* your post type name */
        'post_status' => 'publish',
    ];
    $query = new WP_Query($args);
    $query->set('posts_per_page', 500);
    $query->query($query->query_vars);




    echo '' ?>
    <div class="primary">
        <main class="site-main mt-5" id="main" role="main">
            <?php if ($query->have_posts()) : ?>
                <div class="container">
                    <header class="mb-5">
                        <h1 class="page-title">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                    <?php
                    ?>

                    <div class="row">
                        <?php
                        $index = 0;
                        $n_of_col = 3;

                        // Start loop
                        while ($query->have_posts()) : $query->the_post();
                            if (has_category($category)) {
                                if ($index % $n_of_col === 0) {
                        ?>
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                    <?php


                                }
                                get_template_part("template-parts/content");


                                $index++;

                                if ($index !== 0 && $index % $n_of_col === 0) {
                                    ?>
                                    </div>
                        <?php
                                }
                            }
                        endwhile;
                        wp_reset_query(); ?>
                    </div>
                </div>
            <?php
            else :
                get_template_part("template-parts/content-none");

            endif;
            ?>
        </main>
    </div>
<?php

}
