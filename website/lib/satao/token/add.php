<?php

/* =============================================================================
 * Satao - Copyright (c) Andrea Davanzo - License MPL v2.0 - satao.page
 * ========================================================================== */

declare(strict_types=1);

function satao_token_add(array &$tokens, string $type, string $value): void
{
  $tokens[] = ['type' => $type, 'value' => $value];
}
