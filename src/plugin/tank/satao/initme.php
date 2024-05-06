<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once __DIR__ . '/retrieve.php';
require_once __DIR__ . '/process.php';

$config = [
  'name' => 'Tank Satao',
  'version' => '2023.1'
];


sesto_hook_simple::getme()->attach('bella.page.text.retrieve', 'tank_satao_retrieve');
sesto_hook_simple::getme()->attach('bella.page.text.process', 'tank_satao_process');

