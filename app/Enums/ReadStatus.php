<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ReadStatus extends Enum
{
    const NONE = 0;
    const READING = 1;
    const READ = 2;
}
