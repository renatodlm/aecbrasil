<?php

/**
 * estudio86 Theme Customizer
 *
 * @package estudio86
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function estudio86_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport         = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'estudio86_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial('blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'estudio86_customize_partial_blogdescription',
		));
	}

	/*========================
	SEC Footer
	===========================*/

	$wp_customize->add_section(
		'sec_footer',
		array(
			'title' => 'Informações do Rodapé',
			'description' => ''
		)
	);


	//Endereço

	$wp_customize->add_setting(
		'set_direitos_text',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_direitos_text',
		array(
			'label' => 'Texto Direitos',
			'description' => '',
			'section' => 'sec_footer',
			'type' => 'textarea'
		)
	);

	//Pagamentos

	$wp_customize->add_setting(
		'set_pagamentos_text',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_pagamentos_text',
		array(
			'label' => 'Titulo de Pagamentos',
			'description' => '',
			'section' => 'sec_footer',
			'type' => 'text'
		)
	);

	//Newsletter

	$wp_customize->add_setting(
		'set_titulo_newsletter',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_titulo_newsletter',
		array(
			'label' => 'Titulo de Newsletter',
			'description' => '',
			'section' => 'sec_footer',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'set_placeholder_newsletter',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_placeholder_newsletter',
		array(
			'label' => 'Placeholder de Newsletter',
			'description' => '',
			'section' => 'sec_footer',
			'type' => 'text'
		)
	);

	$wp_customize->add_setting(
		'set_botao_newsletter',
		array(
			'type' => 'theme_mod',
			'default' => '',
			'sanitize_callback' => 'wp_filter_nohtml_kses'
		)
	);

	$wp_customize->add_control(
		'set_botao_newsletter',
		array(
			'label' => 'Botão de Newsletter',
			'description' => '',
			'section' => 'sec_footer',
			'type' => 'text'
		)
	);
}
add_action('customize_register', 'estudio86_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function estudio86_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function estudio86_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function estudio86_customize_preview_js()
{
	wp_enqueue_script('estudio86-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'estudio86_customize_preview_js');
