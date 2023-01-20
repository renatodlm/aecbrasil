<?php

if (!defined('ABSPATH')) exit;

class AEC_AECAssociados_Dashboard
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
      add_action('admin_menu', array($this, 'set_custom_fields'));
   }

   public function set_custom_fields()
   {
      add_menu_page(
         esc_html__('AEC Associados', 'bora-investir'),
         esc_html__('AEC Associados', 'bora-investir'),
         'manage_options',
         'aec-associados',
         'AEC_AECAssociados_Dashboard::aec_associados_main_menu',
         null,
         1
      );
   }

   public static function aec_associados_main_menu()
   {
      if (!empty($_GET['tab']))
         $active_tab = $_GET['tab'];
      else
         $active_tab = 'geral';

?>
      <div class="wrap">
         <h2><?php esc_html__('AEC Associados - CSV', 'bora-investir'); ?></h2>
         <?php

         settings_errors();

         ?>
         <form id="aec-associados-admin-form" method="post" action="options.php" enctype="multipart/form-data">
            <?php

            if ($active_tab === 'geral')
            {
               settings_fields('aec_associados-geral-setting-group');
               do_settings_sections('aec_associados-geral-section-slug');
            }

            submit_button();

            ?>
         </form>
         <script>
            jQuery(document).on('submit', '#aec-associados-admin-form', function(e) {
               if (jQuery('#submit').hasClass('send-active')) {
                  e.preventDefault();
                  return false;
               }
               jQuery('#submit').addClass('send-active')
            });
         </script>
      </div>
<?php

   }
}
