<?php

/**
 * File of functions
 */

use COOK_THEME\Include\COOK_THEME;

if(!defined('COOK_DIR_PATH')) {
    define('COOK_DIR_PATH', untrailingslashit(get_template_directory()));
}

if(!defined('COOK_DIR_URI')) {
    define('COOK_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once(COOK_DIR_PATH . '/include/helpers/autoloader.php');
require_once(COOK_DIR_PATH . '/include/helpers/template-tags.php');

function cook_get_theme_instance() {
    COOK_THEME::get_instance();
};

cook_get_theme_instance();