<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function canSetSingleOperation()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([1, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperation($addition);

        $this->assertEquals(1, $calculator->count());
    }

    /** @test */
    public function canSetMultipleOperations()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([1, 2]);

        $division = new \App\Calculator\Division();
        $division->setOperands([100, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition, $division]);

        $this->assertEquals(2, $calculator->count());
    }

    /** @test */
    public function operationsIgnoredIfNotInstanceOfOperationInterface()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([1, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition, 1, 2]);

        $this->assertEquals(1, $calculator->count());
    }

    /** @test */
    public function canCalculateResult()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([1, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperation($addition);

        $this->assertEquals(3, $calculator->calculate());
    }

    /** @test */
    public function calculateMethodReturnsMultipleResults()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([1, 2]);

        $division = new \App\Calculator\Division();
        $division->setOperands([100, 2]);

        $calculator = new \App\Calculator\Calculator();
        $calculator->setOperations([$addition, $division]);

        $result = $calculator->calculate();

        $this->assertIsArray($result);
        $this->assertEquals(3, $result[0]);
        $this->assertEquals(50, $result[1]);
    }
}
