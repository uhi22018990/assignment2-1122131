<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once BELLA_DIR . '/config/page.php';
require_once BELLA_DIR . '/plugin/init.php';
require_once BELLA_DIR . '/struct/page.php';

function bella_page_init(bella_app $app, bella_struct_cms $cms): bella_struct_page
{
  $config = bella_config_page($app->filename);

  $page = new bella_struct_page($config);

  /* init plugins */
  foreach ($config['plugins'] ?? [] as $plugin) {
    bella_plugin_init($app, $plugin);
  }

  /* init views */
  foreach ($config['views'] ?? [] as $name => $filename) {
    $cms->views[$name] = $filename;
  }

  return $page;
}
