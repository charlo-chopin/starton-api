<?php

namespace Starton\Enums;

use MabeEnum\Enum;

class Status extends Enum
{
    const UNSIGNED      = 'UNSIGNED';
    const SIGNED        = 'SIGNED';
    const PUBLISHED     = 'PUBLISHED';
    const MINED         = 'MINED';
    const CONFIRMED     = 'CONFIRMED';
    const ERROR_PUBLISH = 'ERROR_PUBLISH';
    const ERROR_TX      = 'ERROR_TX';
}