<?php

declare(strict_types=1);

namespace App\Calculator;

final class Addition
{
    private $operands;

    /**
     * Addition constructor.
     */
    public function __construct()
    {
    }

    public function setOperands(array $operands)
    {
        $this->operands = $operands;
    }

    public function calculate()
    {
        return $this->operands[0] + $this->operands[1];
    }
}
