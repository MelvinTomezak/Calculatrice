<?php

declare(strict_types=1);

use Operateurs\Soustraction;
use PHPUnit\Framework\TestCase;

class SoustractionTest extends TestCase
{
    public function testSoustractionPositiveNumbers(): void
    {
        $soustraction = new Soustraction();
        $this->assertSame(1.0, $soustraction->calcul(3, 2));
    }

    public function testSoustractionNegativeNumbers(): void
    {
        $soustraction = new Soustraction();
        $this->assertSame(1.0, $soustraction->calcul(-2, -3));
    }

    public function testSoustractionZero(): void
    {
        $soustraction = new Soustraction();
        $this->assertSame(2.0, $soustraction->calcul(2, 0));
    }
} 