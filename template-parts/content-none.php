<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estudio86
 */

?>

<section class="no-results not-found">
	<div class="container">
		<header class="page-header">
			<h1 class="page-title"><?php esc_html_e( 'Nada encontrado', 'estudio86' ); ?></h1>
		</header><!-- .page-header -->

		<div class="page-content">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) :

				printf(
					'<p>' . wp_kses(
						/* translators: 1: link to WP admin new post page. */
						__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'estudio86' ),
						array(
							'a' => array(
								'href' => array(),
							),
						)
					) . '</p>',
					esc_url( admin_url( 'post-new.php' ) )
				);

			elseif ( is_search() ) :
				?>
				<p><?php esc_html_e( 'Desculpe, não encontramos nada que coincida com o termo pesquisado. Por favor, tente novamente utilizando outras palavras.', 'estudio86' ); ?></p>
				
				<?php
			else :
				?>
				<p><?php esc_html_e( 'Não conseguimos encontrar o que você estava procurando. Talvez uma busca ajude.', 'estudio86' ); ?></p>
			<?php
			endif;
			?>
		</div><!-- .page-content -->
	</div>
</section><!-- .no-results -->
