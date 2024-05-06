<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

function tank_meta_description(array $meta, $data)
{
  $meta[] = [
    'name' => 'description',
    'content' => $data['page']['description'] ?? ''
  ];
    return $meta;
}

/* attach default hooks */
bella_hook_attach('bella_page_meta', 'tank_meta_description');
