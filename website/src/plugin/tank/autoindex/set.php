<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

function tank_autoindex_set(bella_app $app, bella_struct_cms $cms): void
{
  foreach ($cms->path->items as $segment) {
    $segment->autoindex = true;
  }
}
