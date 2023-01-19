<?php

add_action('tgmpa_register', 'estudio86_register_required_plugins');

function estudio86_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => 'Duplicar página',
			'slug'      => 'duplicate-page',
			'required'  => true,
		),
		array(
			'name'      => 'SVG Support',
			'slug'      => 'svg-support',
			'required'  => true,
		),
		array(
			'name'      => 'Show Current Template',
			'slug'      => 'show-current-template',
			'required'  => true,
		),
		array(
			'name'      => 'Contact Form 7 Honeypot',
			'slug'      => 'contact-form-7-honeypot',
			'required'  => true,
		),
		array(
			'name'      => 'Flamingo',
			'slug'      => 'flamingo',
			'required'  => true,
		),
		array(
			'name'      => 'reSmush.it Image Optimizer',
			'slug'      => 'resmushit-image-optimizer',
			'required'  => true,
		),
		array(
			'name'      => 'Yoast SEO',
			'slug'      => 'wordpress-seo',
			'required'  => true,
		),
		array(
			'name'      => 'ACF Content Analysis for Yoast SEO',
			'slug'      => 'acf-content-analysis-for-yoast-seo',
			'required'  => true,
		),
		array(
			'name'      => 'W3 Total Cache',
			'slug'      => 'w3-total-cache',
			'required'  => false,
		),
		array(
			'name'               => 'Advanced Custom Fields PRO',
			'slug'               => 'advanced-custom-fields-pro',
			'source'             => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
		array(
			'name'               => 'Duplicator PRO',
			'slug'               => 'duplicator-pro-3-8-8',
			'source'             => get_template_directory() . '/plugins/duplicator-pro-3-8-8.zip',
			'required'           => true,
			'version'            => '',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => '',
			'is_callable'        => '',
		),
	);
	$config = array(
		'id'           => 'estudio86',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa($plugins, $config);
}
