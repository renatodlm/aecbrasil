<?php

if (!defined('ABSPATH')) exit;

class AEC_AECAssociados_Sections
{
   private static $instance;

   public static function getInstance()
   {
      if (self::$instance == NULL)
      {
         self::$instance = new self();
      }

      return self::$instance;
   }

   private function __construct()
   {
      add_action('admin_init', array($this, 'aec_associados_init_fields_options'));
   }

   public static function aec_associados_init_fields_options()
   {
      add_settings_section(
         'page_1_section',
         esc_html__('Configurações gerais', 'aecbrasil'),
         'AEC_AECAssociados_Sections::page_1_section_callback',
         'aec_associados_geral_section_slug'
      );
   }

   public static function page_1_section_callback()
   {
      echo '<p>' . esc_html__('Atualizar versão da base de dados para o gráfico da página AEC Associados', 'aecbrasil') . '</p>';
   }
}
