<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    /** @test */
    public function addUpGivenOperands()
    {
        $addition = new \App\Calculator\Addition();
        $addition->setOperands([1, 2]);

        $this->assertEquals(3, $addition->calculate());
    }

    /** @test */
    public function noOperandsGivenThrowsOnCalculation()
    {
        $this->expectException(\App\Calculator\Exceptions\NoOperandsException::class);

        $addition = new \App\Calculator\Addition();
        $addition->calculate();
    }
}
