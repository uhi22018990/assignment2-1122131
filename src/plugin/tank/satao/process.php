<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/config.php';
require_once SATAO_DIR . '/parse/text.php';

function tank_satao_process(bella_app $app, bella_struct_cms $cms): void
{
  $cms->page->html = satao_parse_text(
    $cms->page->text,
    sesto_config(SESTO_SYS_CONF_DIR . DIRECTORY_SEPARATOR . 'satao_macros') ?: []
  );
}
