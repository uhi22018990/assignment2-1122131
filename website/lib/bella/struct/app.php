<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/util/struct.php';
require_once SESTO_DIR . '/route/route.php';

class bella_app extends sesto_struct
{
  public array $config;
  public array $args;
  public array $locale;
  public sesto_route $route;
  public string $content_dir;
  public string $template_dir;
  public string $dirname;
  public string $filename;

}
