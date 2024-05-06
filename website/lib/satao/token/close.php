<?php

/* =============================================================================
 * Satao - Copyright (c) Andrea Davanzo - License MPL v2.0 - satao.page
 * ========================================================================== */

declare(strict_types=1);

function satao_token_close(satao_token $token, array $macros = []): string
{
  $close_string = '';
  if ('tag' === $token->type) {
    if (!(satao_tag_void()[$token->value] ?? false)) {
      $close_string = '</' . $token->value . '>';
    }
  } else if ('macro' === $token->type) {
    $close_string = $macros[$token->value]['close'] ?? '';
  } else if ('cmd' === $token->type) {
    if ($token->value === 'enc') {
      $close_string = htmlentities($token->attribs);
    } else if ($token->value === 'esc') {
      $close_string = $token->attribs;
    } else {
      $close_string = '';
    }
  }
  return $close_string;
}
