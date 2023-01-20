<?php

if (!defined('ABSPATH')) exit;

function aec_get_associados_database()
{
   $version_field = 'aec_associados_database_version';
   $version = get_option($version_field);

   if (empty($version))
      return false;

   $database = get_option($version_field . '_' . $version);

   if (empty($database))
      return false;

   return $database;
}
