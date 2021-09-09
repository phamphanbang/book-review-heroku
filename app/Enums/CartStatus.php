<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CartStatus extends Enum
{
    const SHOPPING = "shopping";
    const PENDING = "pending";
    const CANCEL = "cancel";
    const DONE = "done";
}
