<?php
/**
 * Template part for displaying post content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package estudio86
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header" data-parallax="scroll" data-natural-height="500px" 
data-image-src="<?php the_post_thumbnail_url('post-thumbnail'); ?>">
		<div class="container">
			<div class="conteudo">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
		<div class="overlay"></div>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="container">
			<div class="resumo"><?php the_excerpt(); ?></div>
			<?php the_content(); ?>

			<div class="social-share">
				<div class="social-container">
					<h3>Compartilhe:</h3>
					<div class="social-icons">
						<a class="facebook" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php echo the_permalink();?>"><i class="fi flaticon-facebook"></i></a>
						<a class="twitter" target='_blank' href='https://twitter.com/share?url=<?php echo the_permalink();?>'><i class="fi flaticon-twitter"></i></a>
						<a class="Linkedin" target='_blank' href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo the_permalink();?>&title=<?php echo the_title(); ?>&summary=<?php echo the_title(); ?>&source=<?php bloginfo( 'name' ); ?>"><i class="fi flaticon-linkedin"></i></a>
						<a class="email" target='_blank' href='mailto:?subject=<?php echo the_title(); ?>?&body=<?php echo the_permalink();?>'><i class="fi flaticon-email"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->

<div class="mais-posts">
<?php
	$args = array(
		'numberposts' => 2,
		'orderby' => 'rand',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish',
	);

	$recent_posts = get_posts( $args );
	?>
	<div class="container">
		<h2 class="titulo">Veja mais conteúdos:</h2>
		<div class="row">
			<?php $i=1; foreach ($recent_posts as $post) : ?> 
				<?php if($post) : ?>
					<div class="col-lg-6 coluna-post" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="<?php echo $i; ?>00">
						<?php get_template_part( 'template-parts/content-article' ); ?>
					</div>
				<?php endif ?>
			<?php $i++; endforeach; ?>
		</div>
	</div>
</div>