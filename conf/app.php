<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

/* you should not change this file */
$config = [
  'site_host' => '',
  'site_name' => '',
  'template' => 'default',
  'content_processor' => 'satao',
  'plugins' => [
//    'tank/breadcrumb_attribs',
//    'tank/breadcrumb_headline',
//    'tank/autoindex',
    'tank/satao',
    'tank/title',
    'tank/toc',
    'tank/segment_attribs',
//    'tank/meta_schema',
//    'tank/function_autolist',
//    'tank/function_sidebar',
//    'tank/doclist'
  ], // list of plugins to load
  'plugin_dir' => SESTO_APP_SRC_DIR . '/plugin',
  'sesto_php_ini_set' => [
    'track_errors' => 'true',
    'display_startup_errors' => 'true'
  ],
  'sesto_error_strict' => true,
  'sesto_require' => [
    SESTO_SYS_LIB_DIR . '/satao/initme.php'
  ]
];

$extended_file = __DIR__ . '/app.ext.php';
if (is_file($extended_file) && is_readable($extended_file)) {
  include $extended_file;
}
