<?php

/**
 * Template Name: Sobre
 *
 * The template page for sobre
 *
 * @package estudio86
 * @since 1.0
 */

get_header(); ?>


<section class="sobre-topo pb-0">
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex align-items-center justify-content-between">
        <h1 class="sobre-title">
          <?php the_title(); ?></h1>
        <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
      </div>
    </div>
</section>
<section class="sobre">

  <div class="container">
    <div class="row posts-items d-flex align-items-center">
      <?php while (have_rows('sobre')) : the_row();
        $imagem = get_sub_field('imagem');
        $imagem_src = $imagem['sizes']['crop-512'];
        $titulo = get_sub_field('titulo');
        $texto = get_sub_field('texto');
        $botao = get_sub_field('botao');
      ?>

        <div class="col-md-6 order-2 order-md-1">
          <h4 class="sobre-titulo"><?php echo $titulo; ?></h4>
          <p class="sobre-text"><?php echo $texto; ?></p>
          <?php if ($botao) : ?>
            <a class="bt-link" href="<?php echo $botao['url']; ?>" target="<?php echo $botao['target']; ?>">
              <button class="btn-1">
                <?php echo $botao['title']; ?>
              </button>
            </a>
          <?php endif ?>
        </div>
        <div class="col-md-6 order-1 order-md-2">
          <img class="img-fluid" src="<?php echo $imagem_src;  ?>" alt="<?= $imagem['alt']; ?>">
        </div>
      <?php endwhile; ?>
    </div>
  </div>


  <?php if (have_rows('historia')) :
    $i = 0;
  ?>

    <div class="container history-container">
      <h2 class="history-title"><?php the_field('titulo_da_hitoria'); ?></h2>
      <div class="timeline">
        <?php while (have_rows('historia')) : the_row();
          $titulo = get_sub_field('titulo');
          $conteudo = get_sub_field('conteudo');
          $year_point = get_sub_field('year_point');
        ?>
          <div class="container-timeline year-space <?php if ($i % 2 == 0) {
                                                      echo 'left';
                                                    } else {
                                                      echo 'right';
                                                    } ?>">
            <?php if ($year_point) : ?>
              <div class="year-point <?php if ($i % 2 == 0) {
                                        echo 'text-right text-sm-left';
                                      } else {
                                        echo 'text-right text-sm-right';
                                      } ?>"><?php echo $year_point; ?></div>
            <?php endif; ?>
            <div class="content">
              <h2><?php echo $titulo; ?></h2>
              <p><?php echo $conteudo; ?></p>
            </div>
          </div>
        <?php
          $i++;
        endwhile; ?>

      </div>
    </div>
  <?php endif; ?>

</section>

<section class="parceiros">
  <div class="container">
    <h2 class="parceiros-titulo">
      <?php the_field('parceiros_titulo'); ?>
    </h2>
    <div class="row">
      <?php if (have_rows('parceiros')) : ?>
        <?php while (have_rows('parceiros')) : the_row();
          $logo = get_sub_field('logo');
          $logo_src = $logo['sizes']['crop-512'];
          $link = get_sub_field('link');
        ?>

          <div class="col-md-3 col-sm-6 parceiros-item">
            <a class="bt-link" href="
            <?php if ($link) {
              echo $link['url'];
            } ?>" target="
            <?php if ($link) {
              echo $link['target'];
            } ?>">
              <img class="img-fluid" src="<?php echo $logo_src; ?>" alt="<?php echo $logo['alt']; ?>">
            </a>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>