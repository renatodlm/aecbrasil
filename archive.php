<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estudio86
 */

get_header();
?>

<?php if (have_posts()) : ?>
	<section class="page-content">
		<div class="container">
			<header class="page-header">
				<?php
				the_archive_title('<h1 class="page-title">', '</h1>');
				the_archive_description('<div class="archive-description">', '</div>');
				?>
			</header><!-- .page-header -->
			<div class="row">
				<?php
				/* Start the Loop */
				while (have_posts()) :
					the_post();

					/*
				* Include the Post-Type-specific template for the content.
				* If you want to override this in a child theme, then include a file
				* called content-___.php (where ___ is the Post Type name) and that will be used instead.
				*/
				?>
					<div class="col-md-6">
						<?php get_template_part('template-parts/content', get_post_type()); ?>
					</div>
				<?php

				endwhile;

				the_posts_navigation();

			else :

				?>
				<div class="col-md-6">
					<?php get_template_part('template-parts/content', 'none'); ?>
				</div>
			<?php


			endif;
			?>
			</div>

		</div>
	</section>
	<?php
	get_footer();
