<?php

/* =============================================================================
 * Satao - Copyright (c) Andrea Davanzo - License MPL v2.0 - satao.page
 * ========================================================================== */

declare(strict_types=1);

require_once SATAO_DIR . '/macros.php';
require_once SATAO_DIR . '/tag/void.php';
require_once SATAO_DIR . '/token/close.php';
require_once SATAO_DIR . '/token/open.php';
require_once SATAO_DIR . '/token.php';

function satao_parse_text(string $text, array $ext_macros = []): string
{
  $macros = array_merge(satao_macros(), $ext_macros);
  $start_chars = [SATAO_START_TAG, SATAO_START_MACRO, SATAO_START_CMD];
  $escapable_chars = [SATAO_START_TAG, SATAO_START_MACRO, SATAO_START_CMD, SATAO_CLOSE_TOKEN];
  $end_chars = [' ', PHP_EOL];
  $tokens = [];
  $state = '';
  $macro = '';
  $tag = '';
  $output = '';
  $attrib = '';
  $cmd = '';
  $pos = 0;
  $token_id = 0;
  $prev = PHP_EOL;
  $strlen = strlen($text);
  while ($pos < $strlen) {
    $char = $text[$pos];
//    echo sprintf("prev %s char %s state %s\n", (ord($prev) < 32 ? ord($prev) : $prev), (ord($char) < 32 ? ord($char) : $char), $state);

    if ($state === 'repeat') {
      if (!in_array($char, $start_chars)) {
        $state = '';
      }
      $output .= $char;
    } else if (in_array($char, $start_chars) && $state === 'repeat') {
      $output .= $char;
    } else if (in_array($char, $start_chars) && $char === $prev && $state !== 'store') {
      $state = 'repeat';
      $output .= $prev . $char;
    } else if ($char === SATAO_ESCAPE_CHAR) {
      $state = 'escape';
    } else if ($state === 'escape') {
      if (in_array($char, $escapable_chars)) {
        $output .= $char;
      } else {
        $output .= SATAO_ESCAPE_CHAR . $char;
      }
      $state = '';
    } else if ($state === 'store') {
      if ($char === SATAO_START_CMD && $prev === SATAO_START_CMD) {
        $tokens[$token_id]->attribs = substr($tokens[$token_id]->attribs, 0, -1);
        $token = array_pop($tokens);
        if ($token !== null) {
          $output .= satao_token_close($token, $macros);
        }
        $state = '';
      } else {
        $tokens[$token_id]->attribs .= $char;
      }
    } else if ($char === SATAO_START_TAG && in_array($prev, $end_chars)) {
      $state = 'tag';
    } else if (ctype_alnum($char) && $state === 'tag') {
      $tag .= $char;
    } else if (in_array($char, $end_chars) && $state === 'tag') {
      $tokens[] = new satao_token('tag', $tag, $attrib);
      $output .= satao_token_open(end($tokens), $macros);
      if ($char === PHP_EOL) {
        $output .= PHP_EOL;
      }
      $state = '';
      $tag = '';
      $macro = '';
      $cmd = '';
    } else if ($char === SATAO_OPEN_ATTRIB && $state === 'tag') {
      $state = 'attrib';
      $attrib = '';
    } else if ($char === SATAO_CLOSE_ATTRIB && $state === 'attrib') {
      $tokens[] = new satao_token('tag', $tag, $attrib);
      $output .= satao_token_open(end($tokens), $macros);
      $state = '';
      $tag = '';
      $macro = '';
      $cmd = '';
    } else if ($char === SATAO_START_MACRO && in_array($prev, $end_chars)) {
      $state = 'macro';
      $macro = '';
    } else if ($state === 'macro') {
      if (in_array($char, $end_chars)) {
        $tokens[] = new satao_token('macro', $macro);
        $output .= satao_token_open(end($tokens), $macros);
        if ($char === PHP_EOL) {
          $output .= PHP_EOL;
        }
        $state = '';
        $tag = '';
        $macro = '';
        $cmd = '';
      } else {
        $macro .= $char;
      }
    } else if ($char === SATAO_START_CMD && in_array($prev, $end_chars) && $state === '') {
      $state = 'cmd';
      $cmd = '';
    } else if ($state === 'cmd') {
      if (in_array($char, $end_chars)) {
        $state = 'store';
        $tokens[] = new satao_token('cmd', $cmd);
        $token_id = array_key_last($tokens);
        $tokens[$token_id]->attribs = '';
        $output .= satao_token_open(end($tokens), $macros);
        $tag = '';
        $macro = '';
        $cmd = '';
      } else {
        $cmd .= $char;
      }
    } else if ($char === SATAO_CLOSE_TOKEN && $state === '') {
      $token = array_pop($tokens);
      if ($token !== null) {
        $output .= satao_token_close($token, $macros);
      }
      $state = '';
      $tag = '';
      $macro = '';
      $cmd = '';
      $attrib = '';
    } else if ($state === 'attrib') {
      $attrib .= $char;
    } else {
      $output .= $char;
    }

    $pos++;
    $prev = $char;
  }

  return $output;
}
