<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

function bella_cms_views(bella_struct_cms $cms): array
{
  $views = $cms->views;
  foreach ($cms->path->items as $item) {
    $views = array_merge($views, $item->views);
  }
  return array_merge($views, $cms->page->views);
}
