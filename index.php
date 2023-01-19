<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estudio86
 */

get_header();
?>

	<div class="index">
		<div class="container">
			<div class="row">
				<?php
				if ( have_posts() ) :
					if ( is_home() && ! is_front_page() ) : ?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
					<?php endif; ?>
					<?php while ( have_posts() ) : ?>
						<div class="col-md-6">
							<?php the_post(); ?>
							<?php get_template_part( 'template-parts/content', 'article' ); ?>
						</div>
					<?php endwhile; ?>
				<?php else :?>
					<?php get_template_part( 'template-parts/content', 'none' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>


<?php
get_footer();
