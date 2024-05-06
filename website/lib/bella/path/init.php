<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once BELLA_DIR . '/config/folder.php';
require_once BELLA_DIR . '/struct/path.php';
require_once BELLA_DIR . '/struct/segment.php';
require_once BELLA_DIR . '/plugin/init.php';

function bella_path_init(bella_app $app, bella_struct_cms $cms): bella_struct_path
{
  $path = new bella_struct_path();
  $url_path = '/';
  $parts = explode('/', $app->route->dirname);
  if ('/' === $app->route->dirname) {
    unset($parts[1]);
  }
  foreach ($parts as $key => $dir) {
    if ('' === $dir) {
      $dirname = $app->content_dir;
    } else {
      $url_path .= $dir . '/';
      $dirname .= DIRECTORY_SEPARATOR . $dir;
    }

    $config = bella_config_folder($dirname);
    $segment = new bella_struct_segment($config);
    $segment->dirname = $dirname;
    $segment->url = $app->config['site_host'] . $url_path;

    $path->items[$key] = $segment;
    $path->key_last = $key;

    /* init plugins */
    foreach ($config['plugins'] ?? [] as $plugin) {
      bella_plugin_init($app, $plugin);
    }

    /* init views */
    foreach ($config['views'] ?? [] as $name => $filename) {
      $cms->views[$name] = $filename;
    }

//    foreach ($segment->views as $name -> $path) {
//      $cms->views[$name] = $path;
//    }
  }

  return $path;
}
