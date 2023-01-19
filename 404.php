<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package estudio86
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="container">
			<h1>404</h1>
			<h2>Página não encontrada!</h2>
			<p>Desculpa, a página que está procurando não existe mais, mudou de endereço ou está inativa.</p>
			<a href="<?php echo esc_url( home_url() );?>">
				<button class="bt bt-medio bt-primary">Ir para home</button>
			</a>
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
