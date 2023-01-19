<?php

/**
 * Template Name: Suporte
 *
 * The template page for suporte
 *
 * @package estudio86
 * @since 1.0
 */

get_header(); ?>

<?php if (have_rows('faq')) : ?>
  <section class="faq">
    <div class="container">

      <div class="row">
        <div class="faq-header-row col-12 d-flex align-items-center justify-content-between">
          <h2 class="faq-title order-1">
            FAQ
          </h2>
          <input class="order-sm-2 order-3" type="text" id="myInput" onkeyup="myFunction()" placeholder="<?php echo get_field('placeholder_pesquisa'); ?>" title="buscar">
          <div class="order-sm-3 order-2"><?php get_template_part('template-parts/content', 'breadcrumb') ?></div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">

          <ul id="myUL">

            <!--Accordion wrapper-->
            <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

              <?php
              $i = 0;
              while (have_rows('faq')) : the_row();
                $pergunta = get_sub_field('pergunta');
                $resposta = get_sub_field('resposta');
              ?>
                <!-- Accordion card -->
                <li class="card">

                  <!-- Card header -->
                  <div class="card-header" role="tab" id="heading<?php echo $i; ?>">
                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapse<?php echo $i; ?>" aria-expanded="<?php if ($i == 0) {
                                                                                                                            echo 'true';
                                                                                                                          } else {
                                                                                                                            echo 'false';
                                                                                                                          } ?>" aria-controls="collapse<?php echo $i; ?>">
                      <h5 class="mb-0">
                        <?php echo $pergunta; ?> <i class="fas fa-angle-down rotate-icon"></i>
                      </h5>
                    </a>
                  </div>

                  <!-- Card body -->
                  <div id="collapse<?php echo $i; ?>" class="collapse <?php if ($i == 0) {
                                                                        echo 'show';
                                                                      } ?>" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>" data-parent="#accordionEx">
                    <div class="card-body">
                      <?php echo $resposta; ?>
                    </div>
                  </div>

                </li>

              <?php
                $i++;
              endwhile; ?>
            </div>
            <!-- Accordion wrapper -->
          </ul>
          <div id="not-found" style="display: none;">Nada encontrado, tente utilizar outra palavra chave..</div>

          <script>
            function myFunction() {
              var input, filter, ul, li, a, i, txtValue1, txtValue2, body;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              ul = document.getElementById("myUL");
              li = ul.getElementsByTagName("li");
              ntf = document.getElementById('not-found');

              for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                body = li[i].getElementsByClassName('card-body')[0];
                txtValue1 = a.textContent || a.innerText;
                txtValue2 = body.textContent || body.innerText;
                if (txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                  count + 1;
                  li[i].style.display = "";
                  li[i].classList.add("find");
                } else {
                  li[i].style.display = "none";
                  li[i].classList.remove("find");
                }
              }
              li_ntf = ul.getElementsByClassName("find");
              var count = li_ntf.length;

              if (count > 0) {
                ntf.style.display = "none";

              } else {
                ntf.style.display = "";

              }
            }
          </script>

        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<?php if (have_rows('suporte')) : ?>
  <section class="suporte">
    <div class="container">
      <h1 class="suporte-title">
        <?php the_title(); ?>
      </h1>
      <div class="row posts-items d-flex align-items-center">
        <?php while (have_rows('suporte')) : the_row();
          $imagem = get_sub_field('imagem');
          $imagem_src = $imagem['sizes']['crop-512'];
          $titulo = get_sub_field('titulo');
          $texto = get_sub_field('texto');
          $botao = get_sub_field('botao');
        ?>

          <div class="col-md-6 order-md-1 order-2">
            <img class="img-fluid" src="<?php echo $imagem_src;  ?>" alt="<?= $imagem['alt']; ?>">
          </div>
          <div class="col-md-6 order-md-2 order-1">
            <h4 class="sobre-titulo"><?php echo $titulo; ?></h4>
            <p class="sobre-text"><?php echo $texto; ?></p>
            <?php if ($botao) : ?>
              <div class="d-md-block d-none">
                <a class="bt-link" href="<?php echo $botao['url']; ?>" target="<?php echo $botao['target']; ?>">
                  <button class="btn-1">
                    <?php echo $botao['title']; ?>
                  </button>
                </a>
              </div>
            <?php endif ?>
          </div>
          <?php if ($botao) : ?>
            <div class="d-md-none col-12 d-flex order-3 botao-mobile">
              <a class="bt-link" href="<?php echo $botao['url']; ?>" target="<?php echo $botao['target']; ?>">
                <button class="btn-1">
                  <?php echo $botao['title']; ?>
                </button>
              </a>
            </div>
          <?php endif ?>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
<section class="pt-0"></section>
<?php get_footer(); ?>