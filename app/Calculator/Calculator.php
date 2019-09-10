<?php

declare(strict_types=1);

namespace App\Calculator;

final class Calculator implements Operation
{
    private $operations = [];

    /**
     * Calculator constructor.
     */
    public function __construct()
    {
    }

    public function setOperation(Operation $operation)
    {
        $this->operations[] = $operation;
    }

    public function count()
    {
        return count($this->operations);
    }

    public function setOperations(array $operations)
    {
        $this->operations = array_merge(
            array_filter(
                $operations,
                static function ($element) {
                    return $element instanceof Operation;
                }
            ), $this->operations
        );
    }

    public function calculate()
    {
        if (count($this->operations) === 1) {
            return $this->operations[0]->calculate();
        }

        return array_map(static function ($element) {
            return $element->calculate();
        }, $this->operations);
    }
}
