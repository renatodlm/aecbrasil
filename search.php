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
            $database = aec_get_associados_database();
            $result = [];
            $cpf = get_search_query();
            $cpf = preg_replace('/\D/', '', $cpf);
            foreach ($database as $item)
            {
               if ($cpf === $item[4] && !in_array('Cancelado', $item) && in_array('Ativo', $item))
               {
                  $result = $item;
                  break;
               }
            }
            if (count($result) > 0 && !empty($cpf))
            {
            ?>
               <div class="col-12">
                  <form action="<?php echo get_home_url() ?>/imprimir" method="POST" class="row">
                     <input type="hidden" name="cpf" value="<?php echo $result[4] ?>">
                     <button type="sumit" class="row-table text-left border-0 w-100 d-flex <?php if ($i % 2 != 0)
                                                                                             {
                                                                                                echo 'bg-gray';
                                                                                             } ?>" data-cpf="<?php echo $result[4] ?>">
                        <div class="col-md-1 col-table"><?php echo $result[1] ?></div>
                        <div class="col-md-5 col-table">
                           <?php echo $result[2] ?>
                        </div>
                        <div class="col-md-3 col-table"><?php echo $result[3] ?></div>
                        <div class="col-md-3 col-table"><?php echo $result[5] ?></div>
                     </button>

               </div>
               </form>
            <?php }
            else
            {
               get_template_part('template-parts/content', 'none');
            } ?>
         </div>
      </div>
   </div>
</section>


<?php
get_footer();
