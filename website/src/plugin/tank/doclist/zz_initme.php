<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */


declare(strict_types=1);
require_once SESTO_DIR . '/util/config.php';
require_once SATAO_DIR . '/find/h1.php';

/* attach default hooks */
bella_hook_attach(
  'bella.page.html',
  function (bella_app $app, array $data): array {
    $dir = $data['breadcrumb']['items'][$data['breadcrumb']['key_last']]['dirname'];

    /* generate, read, and merge */
    $doclist = [
      'title' => $data['breadcrumb']['items'][$data['breadcrumb']['key_last']]['headline'] ?? '',
      'sort' => [],
      'docs' => []
    ];
    $config = sesto_config($dir . DIRECTORY_SEPARATOR . '_doclist.php');
    if (false !== $config) {
      $doclist = array_merge($doclist, $config);
    }

    /* sort or use filesystem order */
    $files = $doclist['sort'];
    if (empty($files)) {
      $files = array_diff(scandir($dir), ['..', '.']);
    }
    foreach ($doclist['exclude'] ?? [] as $file) {
      if ((false !== ($key = array_search($file, $files)))) {
        unset($files[$key]);
      }
    }

    foreach ($files as $file) {
      if ('_' !== $file[0]) {
        $path = $dir . '/' . $file;
//        sesto_d($path);
        $h1 = satao_find_h1($path);
        if ('' !== $h1) {
//          sesto_d(pathinfo($path));
          $filename = pathinfo($path, PATHINFO_FILENAME);
          $pathinfo = pathinfo($path);
          $doclist['docs'][$path] = [
            'filename' => str_replace('.' . ($pathinfo['extension'] ?? ''), '', $file),
            'title' => $h1
          ];
        }
      }
    }
//    sesto_d($doclist);
    return ['tank_doclist', $doclist];
  }
);
