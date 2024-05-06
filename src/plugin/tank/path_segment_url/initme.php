<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

const TANK_FUNCTION_DIR = __DIR__;

require_once TANK_FUNCTION_DIR . '/autoindex.php';

$config = [
  'name' => 'Tank function autoindex',
  'version' => '2023.1'
];

  'bella_breadcrumb_crumb',
  function (array $breadcrumb): array {
//    $dir = $breadcrumb['items'][$breadcrumb['key_last']]['dirname'];
//    $files = array_diff(scandir($dir), ['..', '.', 'index.satao']);
//    $toc = [];
//    foreach ($files as $file) {
//      $path = $dir . '/' . $file;
//      $h1 = satao_find_h1($path);
//      if ('' !== $h1) {
//        $toc[pathinfo($file, PATHINFO_FILENAME)] = [
//          'title' => $h1
//        ];
//      }
//    }
//    $breadcrumb['items'][$breadcrumb['key_last']]['tank_tdoc'] = $toc;
    return $breadcrumb;
  }
);
