<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ActivityTypeEnum extends Enum
{
    const READ = 1;
    const UNREAD = 2;
    const READING = 3;
    const UNREADING = 4;
    const FAVORITE = 5;
    const UNFAVORITE = 6;
}
