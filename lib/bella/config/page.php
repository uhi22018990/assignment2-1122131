<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/config.php';

function bella_config_page(string $filename): array
{
  return  sesto_config($filename . '.config.php') ?: [];
}
