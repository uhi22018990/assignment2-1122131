<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

sesto_hook_simple::getme()->attach(
  'bella.cms.init.post',
  function (mixed $title, array $app): string {
    return $app->config['site_name'] ?? '';
  }
);
