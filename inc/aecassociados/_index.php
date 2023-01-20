<?php

if (!defined('ABSPATH')) exit;

require_once __DIR__ . DIRECTORY_SEPARATOR . 'enqueue.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'get-aec-associados-database.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'util-radio-group.php';

require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes/AEC_AECAssociados_Sections.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes/AEC_AECAssociados_Fields.php';
require_once __DIR__ . DIRECTORY_SEPARATOR . 'classes/AEC_AECAssociados_Dashboard.php';

AEC_AECAssociados_Dashboard::getInstance();
AEC_AECAssociados_Sections::getInstance();
AEC_AECAssociados_Fields::getInstance();
