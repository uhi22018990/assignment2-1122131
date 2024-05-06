<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

function tank_meta_schema(array $meta, $data)
{

  $meta[] = [
    'itemprop' => 'name',
    'content' => $data['page']['description'] ?? ''
  ];
  $meta[] = [
    'itemprop' => 'description',
    'content' => $data['page']['description'] ?? ''
  ];
  $meta[] = [
    'itemprop' => 'image',
    'content' => 'a url'
  ];
  return $meta;
}

/* attach default hooks */
bella_hook_attach('bella_page_meta', 'tank_meta_schema');
