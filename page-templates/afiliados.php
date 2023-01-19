<?php

/**
 * Template Name: Afiliados
 *
 * The template page for afiliados
 *
 * @package estudio86
 * @since 1.0
 */

get_header(); ?>

<section class="afiliados">
  <div class="container">
    <div class="row">
      <div class="afiliados-header col-12 d-flex align-items-center justify-content-between">
        <h1 class="afiliados-title">
          <?php the_field('titulo_da_pagina'); ?>
        </h1>
        <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
      </div>
      <div class="col-12">
        <p><?php the_field('conteudo'); ?></p>
      </div>
      <div class="col-12">

        <?php
        $form_shortcode = get_field('form_shortcode');
        echo do_shortcode($form_shortcode); ?>

      </div>
    </div>
  </div>
</section>

<?php if (have_rows('bonus')) : ?>
  <?php while (have_rows('bonus')) : the_row();
    $titulo = get_sub_field('titulo');
    $conteudo = get_sub_field('conteudo');
    $conteudo_inferior = get_sub_field('conteudo_inferior');
  ?>
    <section class="bonus">
      <div class="container">
        <h3 class="bonus-title">
          <?php echo $titulo; ?>
        </h3>
        <p><?php echo $conteudo; ?>
        </p>

        <div class="bonus-container-pc">
          <ul class="bonus-ul plans">
            <li class="bonus-li-header"><?php the_field('titulo_coluna_planos'); ?></li>
            <?php if (have_rows('planos')) :
              while (have_rows('planos')) : the_row();
                $titulo = get_sub_field('titulo');
            ?>

                <li class="bonus-li-list"><?php echo $titulo; ?></li>

            <?php
              endwhile;
            endif; ?>
          </ul>
          <ul class="bonus-ul bonus">
            <li class="bonus-li-header"><?php the_field('titulo_coluna_valor'); ?></li>
            <?php if (have_rows('planos')) :
              while (have_rows('planos')) : the_row();
                $valor = get_sub_field('valor');
            ?>

                <li class="bonus-li-list"><?php echo $valor; ?></li>

            <?php
              endwhile;
            endif; ?>
          </ul>
          <ul class="bonus-ul bonus">
            <li class="bonus-li-header"><?php the_field('titulo_coluna_pontos'); ?></li>
            <?php if (have_rows('planos')) :
              while (have_rows('planos')) : the_row();
                $pontos = get_sub_field('pontos');
            ?>

                <li class="bonus-li-list"><?php echo $pontos; ?></li>

            <?php
              endwhile;
            endif; ?>
          </ul>
        </div>

        <div class="bonus-container-mobile">

          <?php if (have_rows('planos')) :
            while (have_rows('planos')) : the_row();
              $titulo = get_sub_field('titulo');
              $valor = get_sub_field('valor');
              $pontos = get_sub_field('pontos');
          ?>
              <ul class="bonus-ul plans">
                <li class="bonus-li-header"><?php echo $titulo; ?></li>
                <li class="bonus-li-list"><?php echo $valor; ?></li>
                <li class="bonus-li-header-each"><?php the_field('titulo_coluna_pontos'); ?></li>
                <li class="bonus-li-list"><?php echo $pontos; ?></li>
              </ul>
          <?php
            endwhile;
          endif; ?>

        </div>

        <p><?php echo $conteudo_inferior; ?>
        </p>
      </div>
    </section>
<?php
  endwhile;
endif; ?>
<section class="pt-0"></section>

<?php get_footer(); ?>