<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);



bella_hook_attach(
  'bella_page_html',
  function (string $text, array $app): string
  {
    $page_content_file = $app->filename . '.html';

    $html = '';
    if (is_file($page_content_file) && is_readable($page_content_file)) {
      $html = file_get_contents($page_content_file);
    }
    return $html;
  }
);