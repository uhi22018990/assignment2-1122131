<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

const TANK_AUTOINDEX_DIR = __DIR__;
const TANK_AUTOINDEX_VERSION = '2023.1';

require_once TANK_AUTOINDEX_DIR . '/set.php';

sesto_hook_simple::getme()->attach('bella.path.autoindex', 'tank_autoindex_set');
