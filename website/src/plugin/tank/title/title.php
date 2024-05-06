<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */


declare(strict_types=1);

function tank_title(bella_app $app, bella_struct_cms $cms): void
{
  $cms->metadata->title = $app->config['site_name'] ?? '';
}