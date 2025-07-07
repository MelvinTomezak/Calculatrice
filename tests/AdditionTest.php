<?php

declare(strict_types=1);

use Operateurs\Addition;
use PHPUnit\Framework\TestCase;

class AdditionTest extends TestCase
{
    public function testAdditionPositiveNumbers(): void
    {
        $addition = new Addition();
        $this->assertSame(5.0, $addition->calcul(2, 3));
    }

    public function testAdditionNegativeNumbers(): void
    {
        $addition = new Addition();
        $this->assertSame(-5.0, $addition->calcul(-2, -3));
    }

    public function testAdditionZero(): void
    {
        $addition = new Addition();
        $this->assertSame(2.0, $addition->calcul(2, 0));
    }
} 