<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/struct.php';

final class bella_struct_page extends sesto_struct
{

  public string $id = '';
  public string $name = '';
  public string $headline = '';
  public string $abstract = '';
  public string $description = '';
  public string $url = '';
  public string $image = '';
  public string $text = '';
  public string $html = '';
  public array $views = [];
  public array $js_top = [];
  public array $js_bottom =[];
  public array $css = [];
  public array $meta = [];
  public array $plugins = [];

}
