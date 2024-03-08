<?php
// 
// Template for post
// 

get_header();
?>

<div id="primary">
    <main class="site-main mt-5" id="main" role="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <?php if (have_posts()) : ?>
                        <div class="post-wrap">

                            <?php
                            if (is_home() && !is_front_page()) {
                            ?>
                                <header class="mb-5">
                                    <h1 class="page-title">
                                        <?php single_post_title(); ?>
                                    </h1>
                                </header>
                            <?php
                            }
                            // Start loop
                            while (have_posts()) :
                                the_post();

                                get_template_part('template-parts/content');

                            endwhile ?>
                        </div>
                    <?php
                    else : // can be bug here
                        get_template_part('template-parts/content-none');

                    endif;
                    ?>
                    <div class="container">
                        <?php
                        previous_post_link('Also you can go to previous post - %link or ');
                        ?>
                        <?php
                        next_post_link('to next post - %link');
                        ?>
                        </span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>

    </main>
</div>


<?php
get_footer();
?>