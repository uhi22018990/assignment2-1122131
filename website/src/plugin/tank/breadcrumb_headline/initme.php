<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */

declare(strict_types=1);

require_once SATAO_DIR . '/find/h1.php';

/* attach default hooks */
bella_hook_attach(
  'bella_data_breadcrumb',
  function (array $breadcrumb): array {
    foreach ($breadcrumb['items'] as $key => $crumb) {
      if ('' === $crumb['headline']) {
        $breadcrumb['items'][$key]['headline'] = satao_find_h1($crumb['dirname'] . DIRECTORY_SEPARATOR . 'index.satao');
      }
    }
    return $breadcrumb;
  }
);
