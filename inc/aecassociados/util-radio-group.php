<?php

if (!defined('ABSPATH')) exit;

function aec_associados_radio_group($input_name, $options, $disabled_mgs = '', $class = '')
{
   if (empty($input_name))
      return '';

   if (!is_array($options))
      return '';

   $html = '<div class="aec-associados__radio-group ' . esc_attr($class) . '">';

   foreach ($options as $key => $option)
   {
      $disabled = '';

      if (str_contains($option, '_disabled'))
      {
         $option   = str_replace('_disabled', '', $option);
         $disabled = 'disabled';
      }

      $key_id = 'filter-' . sanitize_title($key);

      $html .= <<<RADIO
         <input type="radio" id="{$key_id}" name="{$input_name}" class="aecAssociados__field aec-associados__radio-group__input" value="{$key}" {$disabled}>
         <label for="{$key_id}" class="aec-associados__radio-group__label {$disabled}">{$option}
RADIO;

      if (!empty($disabled_mgs) && !empty($disabled))
      {
         $html .= <<<DISABLED_MSG
            <div class="aec-associados__disabled-msg">
               {$disabled_mgs}
            </div>
DISABLED_MSG;
      }

      $html .= '</label>';
   }

   $html .= '</div>';

   return $html;
}
