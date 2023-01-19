<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package estudio86
 */

get_header();

the_content();
$today = date("d/m/Y");
?>


<?php
while (have_posts()) :
	the_post();

?>
	<style>
		body {
			background-color: #eee !important;
		}
	</style>
	<div class="topo-interna" class="parallax-window" data-parallax="scroll" data-position="center top" data-image-src="<?php the_post_thumbnail_url('topo-interna'); ?>">
		<div class="container d-flex">
			<div class="conteudo d-flex align-items-center justify-content-between w-100">
				<div class="titulo-topo">
					<h1 class="page-title"><?php the_title(); ?></h1>
				</div>
				<a class="text-white" href="<?php echo get_home_url(); ?>"><button class="btn btn-voltar">Voltar</button></a>
			</div>
		</div>
		<div class="overlay"></div>
	</div>
	<section class="pb-0">
		<div class="container text-center">
			<input class="btn-enviar" type='button' id='btn' value='IMPRIMIR' onclick='printDiv();'>
		</div>
	</section>
	<section>
		<div id="declaracao" class="declaracao">
			<div class="container py-5">
				<div class="row justify-content-center">
					<div class="col-lg-11">
						<div class="row d-flex align-items-between height-set">
							<div class="col-12">
								<div class="container">
									<div class="col-12 pt-5">
										AUTENTICADA<br>
										Documento Assinado Digitalmente em <strong><?php echo $today; ?></strong><br>
										A validade deste documento, fica sujeito à comprovação de sua autenticidade na respectiva entidade.<br>
										Informando sua respectiva inscrição Associativa.
									</div>
									<div class="col-md-3 py-5">
										<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/imgs/logo-interna.png" alt="aec">
									</div>
									<div class="col-12 text-center py-5">
										<strong>
											<h3>DECLARAÇÃO</h3>
										</strong>
										<?php
										if (strtolower(get_field('tipo')) == 'dependente') {
											$codigo = get_field('codigo');

											// args
											$args = array(
												'numberposts'	=> -1,
												'post_type'		=> 'post',
												'post__not_in' => array(get_the_ID()),
												'meta_query' => array(
													array(
														'key' => 'codigo',
														'value' => $codigo,
														'compare' => 'LIKE'
													)
												)
											);

											// query
											$the_query = new WP_Query($args);

											if ($the_query->have_posts()) :
												while ($the_query->have_posts()) : $the_query->the_post();
													$titular_id = get_the_ID();
													$titular_nome = get_the_title();
												endwhile;
											endif;
											wp_reset_query();
										}

										?>
										<p class="text-left">
											Declaramos, para os devidos fins, que o(a) <strong><?php the_title(); ?></strong>, CPF sob nº <strong><?php the_field('cpf'); ?></strong>, <?php if (strtolower(get_field('tipo')) == 'dependente') : ?> dependente de <strong><?php echo $titular_nome; ?></strong> CPF sob nº <strong><?php the_field('cpf', $titular_id); ?></strong><?php endif; ?>, é associado da AECBRASIL – Associação dos Empregados no Comércio, desde o dia <strong><?php the_field('vigencia'); ?></strong>, inscrito
												na categoria Sócio (a) Contribuinte – Inscrição <strong><?php the_field('codigo'); ?></strong>

										</p>
									</div>
									<div class="text-right">

										Foz do Iguaçu, <strong><?php echo $today; ?></strong>
									</div>
								</div>
							</div>
							<div class="col-12" style="margin-top: 250px;">
								<div class="container">
									<div class="col-12 text-center">
										<p><img class="img-fluid h-auto" style="width: 150px;" src="<?php echo get_template_directory_uri(); ?>/imgs/assinatura.png" alt="assinatura"></p>
										ASSOCIAÇÃO DOS EMPREGADOS NO COMÉRCIO
									</div>
									<div class="col-12 py-5">
										AEC BRASIL - CNPJ: 08.901.000/0001-74<br>
										Rua Jorge Sanwais, 664, 3 andar, sala 14<br>
										Edifício Castro - Centro<br>
										CEP: 85851-150 - Foz do Iguaçu – PR<br>
										<u>www.aecbrasil.org.br</u><br>
										E-mail.: <u><a href="mailto:contato@aecbrasil.org.br">contato@aecbrasil.org.br</a></u><br>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-0">
		<div class="container text-center">
			<input class="btn-enviar" type='button' id='btn' value='IMPRIMIR' onclick='printDiv();'>
		</div>
	</section>
	<script>
		function printDiv() {

			var divToPrint = document.getElementById('declaracao');

			var newWin = window.open('', 'Print-Window');
			var bootstrap = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">';

			newWin.document.open();

			newWin.document.write('<html><body onload="window.print()">' + bootstrap + divToPrint.innerHTML + '</body></html>');

			newWin.document.close();

			setTimeout(function() {
				newWin.close();
			}, 10);

		}
	</script>
<?php

endwhile; // End of the loop.
?>


<?php
get_footer();
