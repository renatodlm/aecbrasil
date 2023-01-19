<?php

/**
 * Template Name: Home
 *
 * The template page for home page
 *
 * @package estudio86
 * @since 1.0
 */

get_header();
?>

<div class="topo-interna" class="parallax-window" data-parallax="scroll" data-position="center top" data-image-src="<?php the_post_thumbnail_url('topo-interna'); ?>">
    <div class="container d-flex">
      <div class="conteudo d-flex align-items-center justify-content-between w-100">
        <div class="titulo-topo">
          <h1 class="page-title">Busque pelo seu nome:</h1>
        </div>
      </div>
    </div>
    <div class="overlay"></div>
  </div>
<section class="seach-home">
  
  <div class="container">
    <form class="d-flex align-items-center" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
      <input type="search" class="form-control form-control-sm w-100" placeholder="<?php echo esc_attr_x('Buscar&hellip;', 'placeholder', 'wpcurso'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
      <button type="submit"><?php echo _x('Buscar', 'submit button', 'wpsmweb'); ?></button>
    </form>
  </div>
</section>


<?php
get_footer();
