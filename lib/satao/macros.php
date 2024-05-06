<?php

/* =============================================================================
 * Satao - Copyright (c) Andrea Davanzo - License MPL v2.0 - satao.page
 * ========================================================================== */

declare(strict_types=1);

function satao_macros(): array
{
  return [
    'satao-info' => [
      'open' => '<div class="satao-info">',
      'close' => '</div>'
    ],
    'satao-success' => [
      'open' => '<div class="satao-success">',
      'close' => '</div>'
    ],
    'satao-warning' => [
      'open' => '<div class="satao-warning">',
      'close' => '</div>'
    ],
    'satao-danger' => [
      'open' => '<div class="satao-danger">',
      'close' => '</div>'
    ],
  ];
}
