<?php
/**
 * Template Name: Blog
 *
 * The template page for blog
 *
 * @package estudio86
 * @since 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content', 'topo' ); ?>

<div class="lista-blog">
    <div class="container">
    <?php
        $args = array(
        'post_type'=> 'post',
        'orderby'    => 'date',
        'post_status' => 'publish',
        'order'    => 'DESC',
        'posts_per_page' => 8,
        'paged' => get_query_var('paged') ? get_query_var('paged') : 1
        );
        $result = new WP_Query( $args );
        if ( $result-> have_posts() ) : ?>
        <div class="row">
            <?php while ( $result->have_posts() ) : $result->the_post(); ?>
                <div class="col-md-6">
                    <?php get_template_part( 'template-parts/content', 'article' ); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="row">
            <?php
                echo new_pagination($result, $paged);
                wp_reset_postdata();
            ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
get_footer(); ?>