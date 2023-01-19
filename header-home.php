<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package estudio86
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body class="pt-0" <?php body_class(); ?>>
	<header id="header" class="home">
		<div class="container">
			<nav class="navbar navbar-expand-lg d-flex align-items-start p-0">
				<?php
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo = wp_get_attachment_image_src($custom_logo_id, 'logo');
				$logo_alt = get_field('logo_alternativo', 'option');
				if (has_custom_logo()) :
				?>
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logo"></a>
				<?php
				elseif ($logo_alt) :
				?>
					<a href="<?php echo get_home_url(); ?>"><img src="<?php echo $logo_alt['url']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logo-alt"></a>
				<?php
				else :
				?>
					<a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
				<?php
				endif;
				?>
				<button class="navbar-toggler" type="button" data-trigger="#main_nav">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse" id="main_nav">

					<div class="offcanvas-header mt-3">
						<button class="btn btn-close float-right"> &times </button>
					</div>


					<?php
					wp_nav_menu(
						array(
							'theme_location'    => 'menu_header',
							'depth'             => 2,
							'container'         => 'ul',
							'container_class'   => 'navbar-nav ml-auto',
							'container_id'      => 'menu-collapse',
							'menu_class'        => 'navbar-nav ml-auto menu-header',
							'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
							'walker'            => new WP_Bootstrap_Navwalker(),
						)
					);
					?>
					<ul class="header-login">
						<li>
							<a href="<?php echo get_admin_url(); ?>"> <button class="btn-login"><i class="header-icon-login"></i>Login</button></a>
						</li>
					</ul>
				</div> <!-- navbar-collapse.// -->
			</nav>
		</div>
	</header>

	<?php
	$whatsapp_flutuante = get_field('whatsapp_flutuante', 'option');
	$whatsapp = get_field('whatsapp', 'option');
	$whatsapp_number = preg_replace('/\D/', '', $whatsapp)
	?>
	<?php if ($whatsapp_flutuante && $whatsapp) : ?>
		<div class="whatsapp-flutuante" data-toggle="tooltip" data-placement="left" title="Fale conosco no Whatsapp">
			<a href="https://wa.me/55<?= $whatsapp_number; ?>" target="_blank">
			</a>
		</div>
	<?php endif; ?>