<?php

/* =============================================================================
 * Satao - Copyright (c) Andrea Davanzo - License MPL v2.0 - satao.page
 * ========================================================================== */

declare(strict_types=1);

function satao_token_open(satao_token $token, array $macros = []): string
{
  if ('tag' === $token->type) {
    $output = '<' . $token->value;
    if ($token->attribs !== '') {
      $output .= ' ' . $token->attribs;
    }
    if (satao_tag_void()[$token->value] ?? false) {
      $output .= ' /';
    }
    $output .= '>';
  } else if ('macro' === $token->type) {
    $output = $macros[$token->value]['open'] ?? '';
  } else {
    $output = '';
  }
  return $output;
}
