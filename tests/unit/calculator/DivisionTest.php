<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    /** @test */
    public function diviidesGivenOperands()
    {
        $division = new \App\Calculator\Division();
        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }

    /** @test */
    public function noOperandsGivenThrowsOnCalculation()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Division();
        $addition->calculate();
    }

    /** @test */
    public function ignoresDivisionByZero()
    {
        $division = new \App\Calculator\Division();
        $division->setOperands([10, 0, 0, 2]);

        $this->assertEquals(5, $division->calculate());
    }
}
