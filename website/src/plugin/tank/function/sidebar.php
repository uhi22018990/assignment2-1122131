<?php

/* =============================================================================
 * Bella CMS - Copyright (c) Andrea Davanzo - License MPL v2.0 - bella.org
 * ========================================================================== */


declare(strict_types=1);

function tank_function_sidebar(bella_app $app, bella_struct_cms $cms): void
{


  $doclist = sesto_config($app->dirname . '/' . '_doclist.php');
  sesto_d($doclist, '$doclist');
  sesto_d($cms->path->items[$cms->path->key_last], '$segment');

  sesto_d($cms);
  die;
  $cms->views['tank.toc'] = __DIR__ . DIRECTORY_SEPARATOR . 'sidebar.phtml';

}
