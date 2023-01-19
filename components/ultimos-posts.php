<?php 

// Excerpt Length
function wpdocs_custom_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
function wpdocs_excerpt_more( $more ) {
    return '[...]';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


$args = array( 
    'posts_per_page' => 3,
);
$the_query = new WP_Query( $args ); 
?>
<?php if ( $the_query->have_posts() ) : $n=1;?>
    <div id="Blog" class="ultimos-posts">
        <div class="container">
            <div class="titulo"><h2>Blog</h2></div>
            <div class="row d-flex align-items-stretch">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="col-lg-4 col-md-6 coluna-post">
                        <?php get_template_part( 'template-parts/content-article' ); ?>
                    </div>
                <?php $n++; endwhile; ?>
            </div>
            <button class="bt bt-pequeno bt-primary margin-center">Ver todas matérias</button>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>