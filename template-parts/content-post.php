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
    <header class="entry-header" data-parallax="scroll" data-natural-height="500px" data-image-src="<?php the_post_thumbnail_url('post-thumbnail'); ?>">
        <div class="conteudo">
            <h1><?php the_title(); ?></h1>
        </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="resumo"><?php the_excerpt(); ?></div>
    </div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->