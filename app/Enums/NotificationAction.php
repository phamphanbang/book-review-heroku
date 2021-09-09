<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class NotificationAction extends Enum
{
    const CREATED = 'created';
    const UPDATED = 'updated';
    const DELETED = 'deleted';
}
