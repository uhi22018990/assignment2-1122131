<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/struct.php';

class bella_struct_metadata extends sesto_struct
{
  public array $link = [];
  public array $meta = [];
  public array $script = [];
  public string $style = '';
  public array $template = [];
  public string $title = '';

}
