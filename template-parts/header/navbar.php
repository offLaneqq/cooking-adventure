<?php

/**
 * Header Navbar
 */

use COOK_THEME\Include\Menus;

$menu_class = Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id('cook-header-menu');

$header_menus = wp_get_nav_menu_items($header_menu_id);

?>

<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #76e3c0;">
    <div class="container">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if (function_exists('the_custom_logo')) {
                    the_custom_logo();
                }
                if (!empty($header_menus) && is_array($header_menus)) {
                ?>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                        foreach ($header_menus as $menu_item) {

                            if ($menu_item->object_id != 24 && !$menu_item->menu_item_parent) {

                        ?>
                                <li class="nav-item mr-2">
                                    <a class="nav-link" href="<?php echo esc_url($menu_item->url); ?>">
                                        <?php
                                        echo esc_html($menu_item->title);
                                        ?>
                                    </a>
                                </li>
                            <?php
                            } elseif ($menu_item->object_id == 24) {

                            ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="<?php echo esc_url($menu_item->url); ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <?php
                                        echo esc_html($menu_item->title);
                                        ?>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <!-- 
                                            Hardcode bcs was bug with parent-item. Always display equal to zero when page has childrens
                                         -->
                                        <a class="dropdown-item" href="<?php echo esc_url('http://cooking-theme.local/cuisines/ukrainian-cuisine/'); ?>">
                                            <?php echo esc_html('Ukrainian cuisine'); ?>
                                        </a>
                                        <a class="dropdown-item" href="<?php echo esc_url('http://cooking-theme.local/cuisines/chinese-cuisine/'); ?>">
                                            <?php echo esc_html('Chinese cuisine'); ?>
                                        </a>
                                        <a class="dropdown-item" href="<?php echo esc_url('http://cooking-theme.local/cuisines/italian-cuisine/'); ?>">
                                            <?php echo esc_html('Italian cuisine'); ?>
                                        </a>
                                    </div>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                <?php
                }
                ?>
                <?php
                ?>
                <div class="box">
                    <?php get_search_form(); ?>
                </div>

            </div>
        </div>
    </div>
</nav>