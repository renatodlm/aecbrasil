<?php 
$args = array( 
    'post_type' => 'clientes', 
    'posts_per_page' => -1,
    'orderby'=>'title',
    'order'=>'ASC'
);
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : ?>
    <div class="clientes-bloco">
        <div class="container">
            <div class="titulo">
                <h2>Clientes</h2>
            </div>
            <div class="clientes">
                <div class="clientes-carousel">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="cliente">
                            <?php the_post_thumbnail('cliente', array( 'title' => get_the_title() )); ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>