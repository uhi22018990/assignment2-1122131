<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/string/path.php';
require_once SESTO_DIR . '/route/solve.php';
require_once SESTO_DIR . '/locale/auto.php';
require_once SESTO_DIR . '/locale/resolve.php';
require_once SESTO_DIR . '/hook/simple.php';
require_once SESTO_DIR . '/string/spacetrim.php';
require_once SESTO_DIR . '/scd/scd.php';
require_once SESTO_DIR . '/scd/call.php';

require_once BELLA_DIR . '/struct/app.php';
require_once BELLA_DIR . '/plugin/init.php';
require_once BELLA_DIR . '/plugin/require.php';

function bella_engine(array $config, array $args = []): void
{
//  ob_start('sesto_spacetrim');
  /* normalize config array */
  $config['route_base_dir'] = $config['route_base_dir'] ?? '';
  if ('' === ($config['router'] ?? '')) {
    $config['router'] = 'sesto_route_resolve';
  }

  /* define the $app array */
  $app = new bella_app();
  $app->config = $config;
  $app->args = $args;
  $app->locale = sesto_locale_resolve(sesto_locale_auto());

  /* normalize some $config data */
  $app->config['site_host'] = (string) $app->config['site_host'] ?? '';

  /* start routing */
  $app->route = sesto_route_solve($config['route_base_dir'] ?? null, $_SERVER['REQUEST_URI'] ?? '');

  /* content_dir and template_dir */
  $app->content_dir = sesto_path(SESTO_APP_SRC_DIR, 'content');
  $app->template_dir = sesto_path(SESTO_APP_SRC_DIR, 'template', $app->config['template']);

  /* dirname */
  $app->dirname = $app->content_dir;
  if ('/' !== $app->route->dirname) {
    $app->dirname .= DIRECTORY_SEPARATOR . trim($app->route->dirname, '/');
  }
  $app->filename = $app->dirname . DIRECTORY_SEPARATOR . $app->route->filename;

  /* init plugins */
  foreach ($app->config['plugins'] as $plugin) {
    bella_plugin_init($app, $plugin);
  }

  /* check if a php exists if not use bella page render */
  $path_cms_bin = $app->filename . '.php';

  /* dispatch */
  if (is_file($path_cms_bin) && is_readable($path_cms_bin)) {
    $callable = 'bella_exec';
    $require = $path_cms_bin;
  } else {
    $callable = 'bella_page_render';
    $require = BELLA_DIR . '/page/render.php';
  }
  /* end routing */

  sesto_scd_call(new sesto_scd($callable, $require, [$app]));
}
