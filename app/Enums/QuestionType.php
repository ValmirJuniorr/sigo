<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class QuestionType extends Enum
{
    const ITEGER = 0;
    const STRING = 1;
    const BOOLEAN = 2;

    /**
     * Get the description for an enum value
     *
     * @param $value
     * @return string
     */
    public static function getDescription($value): string
    {
        if ($value === self::OptionOne) {
            return 'Option one';
        }

        return parent::getDescription($value);
    }
}
