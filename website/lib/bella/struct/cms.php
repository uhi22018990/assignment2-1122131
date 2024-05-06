<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/struct.php';

require_once BELLA_DIR . '/struct/metadata.php';
require_once BELLA_DIR . '/struct/path.php';
require_once BELLA_DIR . '/struct/page.php';

class bella_struct_cms extends sesto_struct
{
  public ?bella_struct_metadata $metadata;
  public ?bella_struct_path $path;
  public ?bella_struct_page $page;
  public array $processors = [];
  public array $views = [];
  public array $plugins = [];
  public array $store = [];

}
