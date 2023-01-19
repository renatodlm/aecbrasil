<?php

//                                    //
//                ACF                 //
//                                    //

// Define path and URL to the ACF plugin.
define('MY_ACF_PATH', get_stylesheet_directory() . '/inc/files/acf/');
define('MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/files/acf/');

// Include the ACF plugin.
include_once(MY_ACF_PATH . 'acf.php');

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url($url)
{
	return MY_ACF_URL;
}

// Add options page
if (function_exists('acf_add_options_page')) {
	// Main Theme Settings Page
	$parent = acf_add_options_page(array(
		'page_title' => 'Opções do Tema',
		'menu_title' => 'Opções do Tema',
		'redirect'   => 'Opções do Tema',
	));

	// Global Options
	// Same options on all languages. e.g., social profiles links
	// 
	acf_add_options_sub_page(array(
		'page_title' => 'Opções Gerais',
		'menu_title' => __('Opções Gerais', 'text-domain'),
		'menu_slug'  => "acf-options",
		'parent'     => $parent['menu_slug']
	));
	acf_add_options_page(array(
		'page_title'    => 'Página Cases',
		'menu_title'    => 'Página Cases',
		'menu_slug'     => 'options_cases',
		'capability'    => 'edit_posts',
		'parent_slug'   => 'edit.php?post_type=cases',
		'position'      => false,
		'icon_url'      => 'dashicons-images-alt2',
		'redirect'      => false,
	));
}

//                                    //
//              ACF END               //
//                                    //

function my_acf_add_local_field_groups()
{
	acf_add_local_field_group(array(
		'key' => 'group_5cd1b75fef58f',
		'title' => 'Opções do Tema',
		'fields' => array(
			array(
				'key' => 'field_5cd1b78b5b4eb',
				'label' => 'Logo Alternativo',
				'name' => 'logo_alternativo',
				'type' => 'image',
				'instructions' => 'Logo alternativo utilizado em páginas que o logo original não é visível.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50%',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_3cg3bh53c6gd7',
				'label' => 'Resolução Logo Header',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Lembre-se de aplicar a resolução para telas de retina (x2).<br><strong>Importante:</strong> Sempre que fizer uma alteração no valor, fazer o recorte novamente em <strong>Aparência > Personalizar</strong>.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_5d4623683ta76',
				'label' => 'Largura do Logo',
				'name' => 'logo_largura',
				'type' => 'number',
				'instructions' => 'Insira a largura do logo do Header.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 255,
				'placeholder' => 255,
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5d8244553da14',
				'label' => 'Altura do Logo',
				'name' => 'logo_altura',
				'type' => 'number',
				'instructions' => 'Insira a altura do logo do Header.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50%',
					'class' => '',
					'id' => '',
				),
				'default_value' => 55,
				'placeholder' => 55,
				'prepend' => '',
				'append' => 'px',
				'min' => '',
				'max' => '',
				'step' => '',
			),
			array(
				'key' => 'field_5cd1bc48c5db7',
				'label' => 'Redes Sociais',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Insira a URL de suas redes sociais.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_5cd1bc78c5db8',
				'label' => 'Facebook',
				'name' => 'facebook',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://www.facebook.com/suaempresa',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cd1bccec5db9',
				'label' => 'Linkedin',
				'name' => 'linkedin',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://www.linkedin.com/company/suaempresa',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cd1bcd9c5dba',
				'label' => 'Youtube',
				'name' => 'youtube',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://www.youtube.com/channel/seucanal',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5cd1bce3c5dbb',
				'label' => 'Instagram',
				'name' => 'instagram',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://www.instagram.com/suaempresa',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_3cs1bgd2c1hjw',
				'label' => 'Twitter',
				'name' => 'twitter',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '20%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'https://twitter.com/suaempresa',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6hf3gd43j2as2',
				'label' => 'Informações de Contato',
				'name' => '',
				'type' => 'message',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'message' => 'Insira os dados de contato.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_3hq7lfn0d8aov',
				'label' => 'E-mail',
				'name' => 'email',
				'type' => 'email',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'contato@suaempresa.com.br',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_6fs3gdf6d2nrg',
				'label' => 'Telefone',
				'name' => 'telefone',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50%',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '(00) 0000-0000',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_4fd7hda4g3fsd',
				'label' => 'Whatsapp',
				'name' => 'whatsapp',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '(00) 00000-0000',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_5e4538b4dbd4e',
				'label' => 'Botão flutuante do Whatsapp',
				'name' => 'whatsapp_flutuante',
				'type' => 'true_false',
				'instructions' => 'Adicione um botão flutuante do whatsapp em todas as páginas do seu site.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '50',
					'class' => '',
					'id' => '',
				),
				'message' => 'Deseja ativar?',
				'default_value' => 0,
				'ui' => 1,
				'ui_on_text' => 'Sim',
				'ui_off_text' => 'Não',
			),
			array(
				'key' => 'field_3ds4gfd5d7sds',
				'label' => 'Endereço',
				'name' => 'endereco',
				'type' => 'text',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => 'Rua dos laranjais, 67 - Cj. 103 Bloco A',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
			array(
				'key' => 'field_4gj5afs9w2gds',
				'label' => 'Código Google Maps',
				'name' => 'google_maps',
				'type' => 'url',
				'instructions' => 'Insira o código de incorporação do Google Maps. <strong>Compartilhar > Incorporar um mapa</strong>',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));
}
add_action('acf/init', 'my_acf_add_local_field_groups');
