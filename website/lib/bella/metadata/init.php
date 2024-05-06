<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once BELLA_DIR . '/struct/metadata.php';

function bella_metadata_init(bella_app $app, bella_struct_cms $cms): bella_struct_metadata
{
  $metadata = new bella_struct_metadata();
  return $metadata;
}
