<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/struct.php';

final class bella_struct_thing extends sesto_struct
{

  public string $abstract = '';
  public string $description = '';
  public string $dirname = '';
  public string $headline = '';
  public string $id = '';
  public string $image = '';
  public string $name = '';
  public string $url = '';
}
