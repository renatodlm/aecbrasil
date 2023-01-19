<?php

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/files/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/files/customizer.php';

/**
 * Customizer CPTS.
 */
require get_template_directory() . '/inc/files/cpts.php';

/**
 * Customizer Custom Functions.
 */
require get_template_directory() . '/inc/files/custom-functions.php';

/**
 * Custom Setup.
 */
require get_template_directory() . '/inc/files/setup.php';

/**
 * Custom Sidebar.
 */
require get_template_directory() . '/inc/files/sidebar.php';

/**
 * Custom Menus.
 */
require get_template_directory() . '/inc/files/menu.php';

/**
 * Plugins-Required.
 */
require get_template_directory() . '/inc/files/plugins-required.php';


// Import Image Crop
require_once get_template_directory() . '/inc/files/image-crop.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/files/jetpack.php';
}

// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/files/class-wp-bootstrap-navwalker.php';

// Register TGM Plugin Activation
require_once get_template_directory() . '/inc/files/class-tgm-plugin-activation.php';

// Import Custom Fields
require_once get_template_directory() . '/inc/files/acf.php';
