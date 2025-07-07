<?php

declare(strict_types=1);

use Operateurs\Multiplication;
use PHPUnit\Framework\TestCase;

class MultiplicationTest extends TestCase
{
    public function testMultiplicationPositiveNumbers(): void
    {
        $multiplication = new Multiplication();
        $this->assertSame(6.0, $multiplication->calcul(2, 3));
    }

    public function testMultiplicationNegativeNumbers(): void
    {
        $multiplication = new Multiplication();
        $this->assertSame(6.0, $multiplication->calcul(-2, -3));
    }

    public function testMultiplicationZero(): void
    {
        $multiplication = new Multiplication();
        $this->assertSame(0.0, $multiplication->calcul(2, 0));
    }
} 