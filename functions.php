<?php

/**
 * File of functions
 */

use COOK_THEME\Include\COOK_THEME;

if (!defined('COOK_DIR_PATH')) {
    define('COOK_DIR_PATH', untrailingslashit(get_template_directory()));
}

if (!defined('COOK_DIR_URI')) {
    define('COOK_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

if (!defined('COOK_BUILD_URI')) {
    define('COOK_BUILD_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build');
}

if (!defined('COOK_BUILD_PATH')) {
    define('COOK_BUILD_PATH', untrailingslashit(get_template_directory()) . '/assets/build');
}

if (!defined('COOK_BUILD_JS_URI')) {
    define('COOK_BUILD_JS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/js');
}

if (!defined('COOK_BUILD_JS_DIR_PATH')) {
    define('COOK_BUILD_JS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/js');
}

if (!defined('COOK_BUILD_IMG_URI')) {
    define('COOK_BUILD_IMG_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/img');
}

if (!defined('COOK_BUILD_CSS_URI')) {
    define('COOK_BUILD_CSS_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/css');
}

if (!defined('COOK_BUILD_CSS_DIR_PATH')) {
    define('COOK_BUILD_CSS_DIR_PATH', untrailingslashit(get_template_directory()) . '/assets/build/css');
}

if (!defined('COOK_BUILD_LIB_URI')) {
    define('COOK_BUILD_LIB_URI', untrailingslashit(get_template_directory_uri()) . '/assets/build/library');
}

require_once(COOK_DIR_PATH . '/include/helpers/autoloader.php');
require_once(COOK_DIR_PATH . '/include/helpers/template-tags.php');

function cook_get_theme_instance()
{
    COOK_THEME::get_instance();
};

cook_get_theme_instance();
