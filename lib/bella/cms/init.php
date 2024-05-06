<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SESTO_DIR . '/string/path.php';
require_once SESTO_DIR . '/util/config.php';
require_once BELLA_DIR . '/struct/cms.php';
require_once BELLA_DIR . '/metadata/init.php';
require_once BELLA_DIR . '/path/init.php';
require_once BELLA_DIR . '/page/init.php';

function bella_cms_init(bella_app $app): bella_struct_cms
{
  $template_config = sesto_config(sesto_path($app->template_dir, '_config')) ?: [];
  $cms = new bella_struct_cms(['views' => $template_config]);
  $cms->metadata = bella_metadata_init($app, $cms);
  $cms->path = bella_path_init($app, $cms);
  $cms->page = bella_page_init($app, $cms);

  sesto_hook_simple::getme()->procedure('bella.cms.init.post', $app, $cms);
  sesto_hook_simple::getme()->procedure('bella.path.init.post', $app, $cms);
  sesto_hook_simple::getme()->procedure('bella.page.init.post', $app, $cms);

  return $cms;
}
