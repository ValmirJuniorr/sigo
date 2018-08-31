<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class QuestionType extends Enum
{
    const NUMERIC = 0;
    const STRING = 1;
    const BOOLEAN = 2;
}
