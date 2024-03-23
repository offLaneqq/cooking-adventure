<?php

/**
 * Footer site
 */

?>
</div>
<footer id="site-footer" class="bg-light p-4">
    <div class="container color-gray">
        <div class="row">
            <section class="col-lg-4 col-md-6 col-sm-12">
                <h1><strong><a href="http://cooking-theme.local/" class="footer-site-logo d-block mb-4">Cooking Adventure</a></strong></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi quasi perferendis ratione perspiciatis accusantium.</p>
            </section>
            <section class="col-lg-4 col-md-6 col-sm-12">
                <?php
                if (is_active_sidebar('sidebar-2')) {
                ?>
                    <aside>
                        <?php dynamic_sidebar('sidebar-2') ?>
                    </aside>
                <?php
                }
                ?>
            </section>
            <section class="col-lg-4 col-md-6 col-sm-12">
                <ul class="d-flex">
                    <li class="list-unstyled"><a href="https://www.linkedin.com/" title="linkedin">
                            <svg width="48">
                                <use href="#icon-linkedin"></use>
                            </svg>
                        </a></li>
                </ul>
            </section>
        </div>
        <div class="row ">
            <div class="col-12 text-center">
                <div class="copyright mt-5">
                    <p><small>© 2023-2024 All Rights Reserved.</small></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
get_template_part('template-parts/content', 'svgs');
wp_footer(); ?>
</div>
</body>

</html>