<?php

if (!defined('ABSPATH')) exit;

class AEC_AECAssociados_Fields
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
      add_settings_field(
         'aec_associados_database',
         esc_html__('AEC Associados .CSV', 'bora-investir'),
         'AEC_AECAssociados_Fields::aec_associados_database_callback',
         'aec_associados-geral-section-slug',
         'page_1_section',
         array(esc_html__('Importe um arquivo CSV da base de dados.', 'bora-investir')),
      );

      register_setting(
         'aec_associados-geral-setting-group',
         'aec_associados_database'
      );

      register_setting("aec_associados-geral-setting-group", "aec_associados_database", "AEC_AECAssociados_Fields::handle_file_upload");
   }

   public static function handle_file_upload($option)
   {
      $field = 'aec_associados_database';
      if (!empty($_FILES[$field]["tmp_name"]))
      {
         $file_path = $_FILES[$field]["tmp_name"];

         $aec_associados_database = [];

         if (($csv_file = fopen($file_path, 'r')) !== false)
         {
            while (($csv_data = fgetcsv($csv_file, 0, ',')) !== false)
            {
               // $column_count = count($csv_data);

               // if ($column_count !== 7)
               //    continue;

               if (in_array(null, $csv_data))
                  continue;

               array_push($aec_associados_database, $csv_data);
            }

            fclose($csv_file);
         }

         if (empty($aec_associados_database))
            return;

         $version = 1;
         $version_field = 'aec_associados_database_version';
         $old_version = get_option($version_field);

         if (!empty($old_version) && $old_version >= 1)
            $version = $old_version + 1;

         if (!empty($version))
            if (update_option($field . '_version_' . $version, $aec_associados_database))
               if (update_option($version_field, $version))
                  if (delete_option($field . '_version_' . $old_version))
                     return $version;
      }

      return $option;
   }

   public static function aec_associados_database_callback($args)
   {

?>
      <input type="file" name="aec_associados_database" accept=".csv" />
<?php

      $version_field = 'aec_associados_database_version';
      $current_version = get_option($version_field);

      if (!empty($current_version) && $current_version >= 1)
      {
         echo '<p><strong>' . esc_html__('Versão Atual:', 'bora-investir') . ' ' . $current_version . '</strong></p>';
         return;
      }

      echo '<p><strong>' . esc_html__('Nenhuma versão cadastrada.', 'bora-investir') . '</strong></p>';
   }
}
