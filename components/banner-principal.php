<?php if( have_rows('banner_principal') ): ?>
    <div class="banner-principal">
        <?php while( have_rows('banner_principal') ): the_row(); 
            $texto = get_sub_field('texto');
            $bg = get_sub_field('background');
            $src = $bg['sizes'][ 'banner-principal' ];
            $imagem = get_sub_field('imagem');
            $src_2 = $imagem['sizes'][ 'crop-512' ];
            $botao = get_sub_field('botao'); 
            ?>
            <div class="slide" style="background-image: url(<?php echo $src; ?>)">
                <div class="container">
                    <div class="row">
                        <div class="coluna col-lg-6">
                            <img src="<?= $src_2; ?>" alt="<?= $imagem['alt']; ?>">
                        </div>
                        <div class="coluna col-lg-6">
                            <div class="conteudo">
                                <h1><?php echo $texto; ?></h1>
                                <?php if ($botao) :?>
                                    <a class="bt-link" href="<?php echo $botao['url']; ?>" target="<?php echo $botao['target']; ?>">
                                        <button class="bt bt-medio bt-primary">
                                            <?php echo $botao['title']; ?>
                                        </button>
                                    </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>