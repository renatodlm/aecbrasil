<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package estudio86
 */

$telefone = get_field('telefone', 'option');
$email = get_field('email', 'option');
$endereco = get_field('endereco', 'option');

?>
<footer id="footer" class="site-footer">
   <div class="top-footer">
      <div class="container">
         <div class="row d-flex justify-content-center align-items-center">
            <div class="col-xl-2 col-lg-3 col-md-2 footer-coluna">
               <?php
               $custom_logo_id = get_theme_mod('custom_logo');
               $logo = wp_get_attachment_image_src($custom_logo_id, 'logo');
               $logo_alt = get_field('logo_alternativo', 'option');
               $logo_largura = get_field('logo_largura', 'option');
               $logo_altura = get_field('logo_altura', 'option');
               if ($logo_alt) :
               ?>
                  <a href="<?php echo get_home_url(); ?>"><img style="width:<?php echo $logo_largura . 'px'; ?>;height:<?php echo $logo_altura . 'px'; ?>" src="<?php echo $logo_alt['url']; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logo-alt"></a>

               <?php
               elseif (has_custom_logo()) :
               ?>
                  <a href="<?php echo get_home_url(); ?>"><img style="width:<?php echo $logo_largura . 'px'; ?>;height:<?php echo $logo_altura . 'px'; ?>" src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" class="logo"></a>
               <?php
               else :
               ?>
                  <a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
               <?php
               endif;
               ?>
            </div>

         </div>
      </div>
   </div>

</footer>


<?php wp_footer(); ?>

</body>

</html>
