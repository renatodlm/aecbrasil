<?php
/**
 * Template Name: Contact
 *
 * The template page for contact
 *
 * @package estudio86
 * @since 1.0
 */

get_header(); ?>

<?php get_template_part( 'template-parts/content', 'topo' ); ?>


<?php if( have_rows('contato') ): 
    while( have_rows('contato') ): the_row();
    $texto = get_sub_field('texto');
    $posts = get_sub_field('contact_form');
    ?>
    <div class="container">
        <div class="content">
            <?php echo $texto; ?>
            <div class="formulario">
                <?php if( $posts ): 
                    foreach( $posts as $p ):
                    $cf7_id= $p->ID;
                    echo do_shortcode( '[contact-form-7 id="'.$cf7_id.'" ]' ); 
                    endforeach; endif; ?>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
<?php endif; ?>

<?php
get_footer(); ?>