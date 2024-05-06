<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

function tank_satao_retrieve(bella_app $app, bella_struct_cms $cms): bool
{
  $page_content_file = $app->filename . '.satao';

  $success = false;
  if (is_file($page_content_file) && is_readable($page_content_file)) {
    $content = file_get_contents($page_content_file);
    if (is_string($content)) {
      $cms->page->text = $content;
      $success = true;
    }
  }
  return $success;
}
