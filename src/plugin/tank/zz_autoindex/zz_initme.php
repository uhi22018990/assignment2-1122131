<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */


declare(strict_types=1);
require_once BELLA_DIR . '/normalize/thing.php';
require_once SESTO_DIR . '/util/config.php';
require_once SATAO_DIR . '/find/h1.php';

/* attach default hooks */
bella_hook_attach(
  'bella_data_page_html',
  function (mixed $html, array $app, array $data) {
    if ('' !== $html) {
      return $html;
    }
    $dir = $app->dirname;

    $files = array_diff(scandir($dir), ['..', '.']);
    $list = [
      'folders' => [],
      'files' => []
    ];
    if (($data['breadcrumb']['key_last'] ?? 0) > 0) {
      $caption = $data['breadcrumb']['items'][$data['breadcrumb']['key_last'] - 1]['url'];
      $list['folders'][$caption] = bella_normalize_thing(
        [
          'url' => $caption,
          'caption' => '/..'
        ]
      );
    }
    $url = $data['breadcrumb']['items'][$data['breadcrumb']['key_last']]['url'];
    foreach ($files as $file) {
      $path = $dir . DIRECTORY_SEPARATOR . $file;
      if (is_dir($path)) {
        $list['folders'][$file] = bella_normalize_thing(
          [
            'caption' => '/' . $file,
            'url' => $url . $file . '/',
          ]
        );
      } else {
        if ('_' !== $file[0] && '.' !== $file[0]) {
          $caption = pathinfo($file, PATHINFO_FILENAME);
          $list['files'][$caption] = bella_normalize_thing(
            [
              'caption' => $caption,
              'url' => $url . $caption,
            ]
          );
        }
      }
    }

    ksort($list['folders']);
    ksort($list['files']);

    ob_start();
    include __DIR__ . DIRECTORY_SEPARATOR . 'template.phtml';
    return (string) ob_get_clean();
  }
);
