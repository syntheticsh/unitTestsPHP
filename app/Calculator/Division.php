<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;

class Division extends AbstractOperation implements Operation
{
    protected $operands;

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

        return array_reduce(array_filter($this->operands), static function ($acc, $item) {
            if ($item !== null && $acc !== null) {
                return $acc / $item;
            }

            return $item;
        }, null);
    }
}
