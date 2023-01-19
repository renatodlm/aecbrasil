<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package estudio86
 */

get_header();
?>

<?php if (have_posts()) : ?>

	<div class="topo-interna" class="parallax-window" data-parallax="scroll" data-position="center top" data-image-src="<?php the_post_thumbnail_url('topo-interna'); ?>">
		<div class="container d-flex">
			<div class="conteudo d-flex align-items-center justify-content-between w-100">
				<div class="titulo-topo">
					<h2 class="page-title text-white font-weight-bold"><?php printf(__('Resultados para: %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h2>
				</div>
				<div class="seach-home">

					<div class="container">
						<form class="d-flex align-items-center" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="search" class="form-control form-control-sm w-100" placeholder="<?php echo esc_attr_x('Buscar&hellip;', 'placeholder', 'wpcurso'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
							<button type="submit"><?php echo _x('Buscar', 'submit button', 'wpsmweb'); ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay"></div>
	</div>

	<section class="py-5">
		<div class="artigos-corpo">
			<div class="container">
				<div class="row mx-0">
					<div class="col-12 header-table">
						<div class="row">
							<div class="col-md-1 col-table">Código:</div>
							<div class="col-md-5 col-table">
								Nome:
							</div>
							<div class="col-md-3 col-table">Nascimento:</div>
							<div class="col-md-3 col-table">Vigencia:</div>
						</div>
					</div>
					<?php
					$i = 0;
					while (have_posts()) : ?>
						<div class="col-12">
							<?php the_post(); ?>
							<a href="<?php echo get_permalink(); ?>">
								<div class="row row-table <?php if ($i % 2 != 0) {
																						echo 'bg-gray';
																					} ?>">
									<div class="col-md-1 col-table"><?php the_field('codigo'); ?></div>
									<div class="col-md-5 col-table">
										<?php the_title(); ?>
									</div>
									<div class="col-md-3 col-table"><?php the_field('data_nascimento'); ?></div>
									<div class="col-md-3 col-table"><?php the_field('vigencia'); ?></div>
								</div>
							</a>
						</div>
					<?php $i++;
					endwhile; ?>
				</div>
			</div>
		</div>
		<div class="container mt-3">
			<div class="row">
				<div class="d-flex justify-content-center col-sm-12 py-3">
					<?php
					the_posts_pagination(array(
						'mid_size' => 1,
						'screen_reader_text' => __(' ')
					)); ?>
				</div>
			</div>
		</div>
	</section>


<?php else : ?>

	<div class="topo-interna" class="parallax-window" data-parallax="scroll" data-position="center top" data-image-src="<?php the_post_thumbnail_url('topo-interna'); ?>">
		<div class="container d-flex">
			<div class="conteudo d-flex align-items-center justify-content-between w-100">
				<div class="titulo-topo">
					<h2 class="page-title text-white font-weight-bold"><?php printf(__('Resultados para: %s', 'shape'), '<span>' . get_search_query() . '</span>'); ?></h2>
				</div>
				<div class="seach-home">

					<div class="container">
						<form class="d-flex align-items-center" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="search" class="form-control form-control-sm w-100" placeholder="<?php echo esc_attr_x('Buscar&hellip;', 'placeholder', 'wpcurso'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
							<button type="submit"><?php echo _x('Buscar', 'submit button', 'wpsmweb'); ?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="overlay"></div>
	</div>

	<?php get_template_part('template-parts/content', 'none'); ?>

<?php endif; ?>

<?php
get_footer();
