<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bellacms.org
 * ========================================================================== */


$config = [
  'site_host' => '',
  'site_name' => 'Satao',
  'template' => 'default',
  'sesto_php_ini_set' => [
    'display_errors' => 'true',
    'track_errors' => 'true',
    'display_startup_errors' => 'true'
  ],
  'sesto_error_strict' => true,
//  'sesto_app_error_handler' => 'sesto_app_error_handler_web',
  'sesto_require' => [
//    SESTO_DIR . '/app/error_handler_web.php',
    SESTO_SYS_LIB_DIR . '/satao/initme.php'
  ]
];
