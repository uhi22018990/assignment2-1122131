<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once BELLA_DIR . '/struct/thing.php';

function tank_function_list(bella_app $app, bella_struct_cms $cms, string $placeholder, array $args): void
{

  $segment = $cms->path->items[$cms->path->key_last];

  $toc = [];
  foreach (($segment->store['tank.toc']['files'] ?? []) as $file) {
    $path = $segment->dirname . DIRECTORY_SEPARATOR . $file . '.satao';
    if (is_file($path) && is_readable($path)) {
      $content = file_get_contents($path);
      $matches = [];
      preg_match_all('/(#function-headline)[\s\S](.*)[\s\S]</', $content, $matches);
      $headline = trim($matches[2][0] ?? '');
      preg_match_all('/(#function-abstract)[\s\S](.*)[\s\S]</', $content, $matches);
      $abstract = trim($matches[2][0] ?? '');
      if ($headline !== '' && $abstract !== '') {
        $toc[] = new bella_struct_thing([
          'headline' => $headline,
          'name' => $headline,
          'url' => $segment->url . $headline,
          'abstract' => $abstract,
        ]);
      }
    }
  }

  if (!empty($toc)) {
    ob_start();
    include(__DIR__ . DIRECTORY_SEPARATOR . 'list.phtml');
    $text = ob_get_clean();
  } else {
    $text = '';
  }
  $cms->page->html = str_replace($placeholder, $text, $cms->page->html);
}
