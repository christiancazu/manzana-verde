<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Plates extends Enum
{
    const LUNCH = 'LUNCH';
    const SALAD = 'SALAD';

    public static function all()
    {
        return [self::LUNCH, self::SALAD];
    }
}
