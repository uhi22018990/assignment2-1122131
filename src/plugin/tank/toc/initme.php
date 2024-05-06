<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once __DIR__ . '/toc.php';

$config = [
  'name' => 'Tank toc',
  'version' => '2023.1'
];

sesto_hook_simple::getme()->attach('bella.path.init.post', 'tank_toc');
