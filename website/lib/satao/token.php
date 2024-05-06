<?php

/* =============================================================================
 * Satao - Copyright (c) Andrea Davanzo - License MPL v2.0 - satao.page
 * ========================================================================== */

declare(strict_types=1);

class satao_token
{

  public string $type;
  public string $value;
  public string $attribs;

  function __construct(string $type, string $value, string $attribs = '')
  {
    $this->type = $type;
    $this->value = $value;
    $this->attribs = $attribs;
  }
}
