<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

final class Addition extends AbstractOperation implements Operation
{
    /**
     * Addition constructor.
     */
    public function __construct()
    {
    }

    public function calculate()
    {
        if (empty($this->operands)) {
            throw new NoOperandsException('No operands');
        }

        return array_sum($this->operands);
    }
}
