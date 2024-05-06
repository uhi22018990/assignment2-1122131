<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */


declare(strict_types=1);

function tank_toc(bella_app $app, bella_struct_cms $cms): void
{
  $segment = $cms->path->items[$cms->path->key_last];
  $toc = [];

  if (isset($segment->store['tank.toc']['links'])) {
    foreach ($segment->store['tank.toc']['links']as $link) {
      $toc[] = new bella_struct_thing([
        'headline' => $link[0] ?? '',
        'name' => $link[0] ?? '',
        'url' => $segment->url . $link[1] ?? '',
      ]);

    }

  } else if (isset($segment->store['tank.toc']['files'])) {
    foreach ($segment->store['tank.toc']['files'] as $file) {

      $path = $segment->dirname . DIRECTORY_SEPARATOR . $file . '.satao';
      if (is_file($path) && is_readable($path)) {
        if ('_' !== $file[0]) {
          $content = file_get_contents($path);
          $matches = [];
          preg_match_all('/(\.h1)[\s\S](.*)[\s\S]?</', $content, $matches);
          $headline = trim($matches[2][0] ?? '');
          if ($headline === '') {
            preg_match_all('/(#function-headline)[\s\S](.*)[\s\S]</', $content, $matches);
            $headline = trim($matches[2][0] ?? '');
          }
          if ($headline !== '') {
            $toc[] = new bella_struct_thing([
              'headline' => $headline,
              'name' => $headline,
              'url' => $segment->url . $file,
            ]);
          }
        }
      }
    }

  }

  $cms->store['tank.toc'] = $toc;
  $cms->views['tank.toc'] = __DIR__ . DIRECTORY_SEPARATOR . 'toc.phtml';

}
