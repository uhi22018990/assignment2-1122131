<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

function bella_plugin_init(bella_app $app, string $plugin): void
{
//  sesto_d($plugin, __FUNCTION__);
  $initme = $app->config['plugin_dir'] . DIRECTORY_SEPARATOR . $plugin . DIRECTORY_SEPARATOR . 'initme.php';
  if (is_file($initme) && is_readable($initme)) {
    bella_plugin_require($app, $initme);
  }
}
