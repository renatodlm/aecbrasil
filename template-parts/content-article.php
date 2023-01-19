<article class="article-post" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if(has_post_thumbnail()): ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <div class="thumbnail" title="<?php the_title_attribute(); ?>">
                <div class="overlay"></div>
                <?php the_post_thumbnail('article-thumbnail'); ?>
            </div>
        </a>
    <?php endif; ?>
    <div class="conteudo">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <h3 class="titulo-post"><?php the_title(); ?></h3>
        </a>
        <div class="resumo">
            <?php the_excerpt(); ?>
        </div>
    </div>
</article>