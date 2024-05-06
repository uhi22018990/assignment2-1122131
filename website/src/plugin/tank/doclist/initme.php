<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once __DIR__ . '/sidebar.php';
require_once __DIR__ . '/autolist.php';

$config = [
  'name' => 'Tank function',
  'version' => '2023.1'
];


//sesto_hook_simple::getme()->attach('bella.path.init.post', 'tank_function_autolist');
//sesto_hook_simple::getme()->attach('bella.page.init.post', 'tank_function_sidebar');


sesto_hook_simple::getme()->attach(
  'bella.page.html',
  function (bella_app $app, bella_struct_cms $cms): void {
    $cms->page->html = json_encode($cms->breadcrumb->items[$cms->breadcrumb->key_last]);
    sesto_d($cms->page);
    die;
//    foreach ($cms->pagefiles as $file) {
//      if ('_' !== $file[0]) {
//        $path = $dir . '/' . $file;
////        sesto_d($path);
//        $h1 = satao_find_h1($path);
//        if ('' !== $h1) {
////          sesto_d(pathinfo($path));
//          $filename = pathinfo($path, PATHINFO_FILENAME);
//          $pathinfo = pathinfo($path);
//          $doclist['docs'][$path] = [
//            'filename' => str_replace('.' . ($pathinfo['extension'] ?? ''), '', $file),
//            'title' => $h1
//          ];
//        }
//      }
//    }
////    sesto_d($doclist);
//    return ['tank_doclist', $doclist];
  }
);
