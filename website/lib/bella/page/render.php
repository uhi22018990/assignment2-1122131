<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/view/render.php';
require_once SESTO_DIR . '/html/build.php';

require_once BELLA_DIR . '/cms/init.php';

function bella_page_render(bella_app $app)
{
  /* start session */
  session_start();

  /* $cms init */
  $cms = bella_cms_init($app);

  /* content management */
  $content_found = sesto_hook_simple::getme()->function('bella.page.text.retrieve', $app, $cms);
  if (!$content_found) {
    throw new exception('Not found', 404);
  }
  sesto_hook_simple::getme()->procedure('bella.page.text.process', $app, $cms);
  sesto_hook_simple::getme()->procedure('bella.page.html.post', $app, $cms);

  /* inline plugins */
  $matches = [];
  preg_match_all('/({plugin)(.*)(})/', $cms->page->html, $matches);

  foreach (($matches[2] ?? []) as $key => $payload) {
    $placeholder = json_decode($payload, true);
    if (is_array($placeholder)) {
      $placeholder_string = $matches[0][$key] ?? '';
      $placeholder_name = $placeholder[0] ?? '';
      $placeholder_args =  $placeholder[1] ?? [];
      if (is_string($placeholder_name) && is_array($placeholder_args)) {
        sesto_hook_simple::getme()->procedure($placeholder_name, $app, $cms, $placeholder_string, $placeholder_args);
      }
    }
  }

  /* render */
  sesto_view_render($cms->views, 'layout', $cms);
}
