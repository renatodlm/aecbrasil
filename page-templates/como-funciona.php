<?php

/**
 * Template Name: Como funciona
 *
 * The template page for como funciona
 *
 * @package estudio86
 * @since 1.0
 */

get_header(); ?>

<?php if (have_rows('como_funciona')) : ?>
  <section class="como-funciona">
    <?php while (have_rows('como_funciona')) : the_row();
      $titulo = get_sub_field('titulo');
      $botao = get_sub_field('botao');
    ?>
      <div class="container justify-content-between">
        <div class="row">
          <div class="col-12 d-flex align-items-center justify-content-between">
            <h1 class="como-funciona-titulo"><?php echo $titulo; ?></h1>
            <?php get_template_part('template-parts/content', 'breadcrumb'); ?>
          </div>
        </div>
        <?php if (have_rows('funcionalidades')) :
          $i = 0; ?>
          <?php while (have_rows('funcionalidades')) : the_row();
            $imagem = get_sub_field('imagem');
            $imagem_src = $imagem['sizes']['crop-512'];
            $texto = get_sub_field('texto');
          ?>
            <div class="row d-flex align-items-center justify-content-between funcionalidade <?php if ($i <= count(get_row('funcionalidades'))) {
                                                                                                echo 'mb-120px';
                                                                                              } ?>">
              <div class="col-md-6 <?php if ($i % 2 != 0) {
                                      echo 'order-md-2 order-1';
                                    } ?>">
                <img class="funcionalidade-img" src="<?php echo $imagem_src; ?>" alt="<?php echo $imagem['alt']; ?>">
              </div>
              <div class="col-md-5 <?php if ($i % 2 != 0) {
                                      echo 'order-md-1 order-2';
                                    } ?>">
                <p class="funcionalidade-text"><?php echo $texto; ?></p>
              </div>
            </div>
        <?php
            $i++;
          endwhile;
        endif; ?>
        <?php if ($botao) : ?>
          <div class="row">
            <div class="col-12 text-center">
              <a class="bt-link" href="<?php echo $botao['url']; ?>" target="<?php echo $botao['target']; ?>">
                <button class="btn-1">
                  <?php echo $botao['title']; ?>
                </button>
              </a>
            </div>
          </div>
        <?php endif ?>
      </div>
    <?php endwhile; ?>
  </section>
<?php endif; ?>

<?php if (have_rows('informacoes_adicionais')) : ?>
  <section class="informacoes-adicionais">
    <?php while (have_rows('informacoes_adicionais')) : the_row();
      $titulo = get_sub_field('titulo');
      $texto = get_sub_field('texto');
    ?>
      <div class="container">
        <h3 class="infos-add-title">
          <?php echo $titulo; ?>
        </h3>
        <p class="infos-add-description">
          <?php echo $texto; ?>
        </p>
      </div>
    <?php endwhile; ?>
  </section>
<?php endif; ?>

<?php if (have_rows('matriz_de_compatibilidade')) : ?>
  <section class="matriz-compatibilidade">
    <?php while (have_rows('matriz_de_compatibilidade')) : the_row();
      $titulo = get_sub_field('titulo');
      $texto = get_sub_field('texto');
      $titulo_variantes = get_sub_field('titulo_variantes');
    ?>
      <div class="container">
        <h3 class="matriz-title">
          <?php echo $titulo; ?>
        </h3>
        <p class="matriz-description">
          <?php echo $texto; ?>
        </p>

        <?php if (have_rows('matriz')) : ?>

          <div class="matriz-table">
            <div class="matriztb-header-green row">
              <?php while (have_rows('matriz')) : the_row();
                $titulo = get_sub_field('titulo');
              ?>
                <div class="col-md"><?php echo $titulo; ?></div>
              <?php endwhile; ?>
            </div>
            <div class="matriztb-header-red row">
              <div class="col-md"><?php echo $titulo_variantes; ?></div>
            </div>
            <div class="matriztb-header-body row d-flex align-items-stretch">

              <?php while (have_rows('matriz')) : the_row();
                $titulo = get_sub_field('titulo');
                $conteudo = get_sub_field('conteudo');
              ?>
                <div class="matriztb-header-green-mobile first">
                  <?php echo $titulo; ?>
                </div>
                <div class="col-md">
                  <div class="col-content">
                    <?php echo $conteudo; ?>
                  </div>
                </div>
              <?php endwhile; ?>

            </div>

          </div>
        <?php endif; ?>

      </div>
    <?php endwhile; ?>
  </section>
<?php endif; ?>



<?php if (have_rows('diferenciais')) : ?>

  <section class="diferenciais">
    <div class="container">
      <h3 class="diferenciais-titulo"><?php the_field('diferenciais_titulo'); ?></h3>
      <div class="row">
        <?php while (have_rows('diferenciais')) : the_row();
          $icone = get_sub_field('icone');
          $icone_src = $icone['sizes']['crop-512'];
          $descricao = get_sub_field('descricao');
        ?>
          <div class="col-md-6">
            <div class="diferencial-item">
              <img class="diferencial-img" src="<?php echo $icone_src; ?>" alt="<?php echo $icone['alt']; ?>">
              <div class="diferencial-text">
                <?php echo $descricao; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>

<?php endif; ?>

<?php if (have_rows('conhecer_os_planos')) : ?>
  <section class="sobre-home">
    <div class="container">
      <div class="row posts-items d-flex align-items-center">
        <?php while (have_rows('conhecer_os_planos')) : the_row();
          $imagem = get_sub_field('imagem');
          $imagem_src = $imagem['sizes']['crop-512'];
          $titulo = get_sub_field('titulo');
          $texto = get_sub_field('texto');
          $botao = get_sub_field('botao');
        ?>

          <div class="col-md-6 order-2 order-md-1">
            <h4 class="sobre-titulo d-md-block d-none"><?php echo $titulo; ?></h4>
            <p class="sobre-text"><?php echo $texto; ?></p>
            <div class="text-md-left text-center">
              <?php if ($botao) : ?>
                <a class="bt-link" href="<?php echo $botao['url']; ?>" target="<?php echo $botao['target']; ?>">
                  <button class="btn-1">
                    <?php echo $botao['title']; ?>
                  </button>
                </a>
              <?php endif ?>
            </div>
          </div>
          <div class="col-md-6 order-1 order-md-2">
            <h4 class="sobre-titulo d-md-none d-block"><?php echo $titulo; ?></h4>
            <img class="img-fluid" src="<?php echo $imagem_src;  ?>" alt="<?= $imagem['alt']; ?>">
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<section class="pt-0"></section>

<?php get_footer(); ?>