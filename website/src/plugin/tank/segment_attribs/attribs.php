<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */


declare(strict_types=1);

function tank_segment_attribs(bella_app $app, bella_struct_cms $cms): void
{
  foreach ($cms->path->items as $segment) {
    $segment->attribs['href'] = $segment->url ?? '';
  }
  if ($cms->path->key_last > 0) {
//    unset($cms->path->items[$cms->path->key_last]->attribs['href']);
    $cms->path->items[$cms->path->key_last]->attribs['aria-current'] = 'page';
  }
}
