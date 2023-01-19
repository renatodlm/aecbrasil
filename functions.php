<?php

/**
 * estudio86 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package estudio86
 */

function theme_styles()
{
	wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/lib/bootstrap/css/bootstrap.min.css', array(), null, false);
	wp_enqueue_style('slick_css', get_template_directory_uri() . '/lib/slick/slick.css', array(), null, false);
	wp_enqueue_style('aos_css', get_template_directory_uri() . '/lib/aos/aos.css', array(), null, false);
	wp_enqueue_style('fancybox_css', get_template_directory_uri() . '/lib/fancybox/jquery.fancybox.min.css', array(), null, false);
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rajdhani:wght@300;400;500;600;700&display=swap', array(), null, false);
	wp_enqueue_style('main_css', get_template_directory_uri() . '/scss/main.css', array(), null, false);
}
add_action('wp_enqueue_scripts', 'theme_styles');

function theme_js()
{
	global $wp_scripts;
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap_js', get_template_directory_uri() . '/lib/bootstrap/js/bootstrap.bundle.min.js', array(), null, false);
	wp_enqueue_script('slick_js', get_template_directory_uri() . '/lib/slick/slick.min.js', array(), null, false);
	wp_enqueue_script('aos_js', get_template_directory_uri() . '/lib/aos/aos.js', array(), null, false);
	wp_enqueue_script('parallax_js', get_template_directory_uri() . '/lib/parallax/parallax.min.js', array(), null, false);
	wp_enqueue_script('mask_js', get_template_directory_uri() . '/lib/mask/jquery.mask.min.js', array(), null, false);
	wp_enqueue_script('fancybox_js', get_template_directory_uri() . '/lib/fancybox/jquery.fancybox.min.js', array(), null, false);
	wp_enqueue_script('custom_js', get_template_directory_uri() . '/js/main.js', array(), null, false);

	wp_enqueue_script('estudio86-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('estudio86-skip-link-focus-fix', get_template_directory_uri() . '/lib/skip-link-focus/skip-link-focus-fix.js', array(), '20151215', true);
}
add_action('wp_enqueue_scripts', 'theme_js');


/**
 * Import Includes.
 */
require get_template_directory() . '/inc/includes.php';
