<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Additionals extends Enum
{
  const INCLUDE_SWEET_POTATO = 'include_sweet_potato';
  const INCLUDE_POTATO = 'include_potato';
  const INCLUDE_RICE = 'include_rice';
  const INCLUDE_SPICY = 'include_spicy';

  public static function all()
  {
    return [self::INCLUDE_SWEET_POTATO, self::INCLUDE_POTATO, self::INCLUDE_RICE, self::INCLUDE_SPICY];
  }
}
