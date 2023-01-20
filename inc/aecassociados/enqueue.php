<?php

if (!defined('ABSPATH')) exit;

add_action('wp_enqueue_scripts', 'aec_associados_enqueue');
function aec_associados_enqueue()
{
   if (basename(get_page_template_slug()) !== 'template-aec-associados.php')
      return;

   $database = aec_get_associados_database();

   if (empty($database))
      return;

   wp_enqueue_script('aec-associados', get_theme_file_uri('/js/aec-associados.js'), [
      'jquery',
   ], false, true);

   wp_localize_script(
      'aec-associados',
      'aecAssociados',
      [
         'DB'              => $database,
      ]
   );
}
