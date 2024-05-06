<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once __DIR__ . '/list.php';

$config = [
  'name' => 'Tank function',
  'version' => '2023.1'
];

sesto_hook_simple::getme()->attach('tank.function.toc', 'tank_function_list');
