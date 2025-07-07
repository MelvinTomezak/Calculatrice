<?php

declare(strict_types=1);

use Operateurs\Division;
use PHPUnit\Framework\TestCase;

class DivisionTest extends TestCase
{
    public function testDivisionPositiveNumbers(): void
    {
        $division = new Division();
        $this->assertSame(2.0, $division->calcul(6, 3));
    }

    public function testDivisionNegativeNumbers(): void
    {
        $division = new Division();
        $this->assertSame(2.0, $division->calcul(-6, -3));
    }

    public function testDivisionByOne(): void
    {
        $division = new Division();
        $this->assertSame(6.0, $division->calcul(6, 1));
    }

    public function testDivisionByZero(): void
    {
        $division = new Division();
        $this->expectException(\DivisionByZeroError::class);
        $division->calcul(6, 0);
    }
} 