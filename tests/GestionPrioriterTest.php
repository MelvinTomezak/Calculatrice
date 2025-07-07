<?php

declare(strict_types=1);

use Calculs\Calculatrice;
use Calculs\GestionPrioriter;
use PHPUnit\Framework\TestCase;

class GestionPrioriterTest extends TestCase
{
    private GestionPrioriter $gestion;

    protected function setUp(): void
    {
        $this->gestion = new GestionPrioriter(new Calculatrice());
    }

    public function testCalculerSimpleAddition(): void
    {
        $this->assertSame(5.0, $this->gestion->calculer('2+3'));
    }

    public function testCalculerPrioriteMultiplicationAvantAddition(): void
    {
        $this->assertSame(8.0, $this->gestion->calculer('2+3*2'));
    }

    public function testCalculerParentheses(): void
    {
        $this->assertSame(10.0, $this->gestion->calculer('(2+3)*2'));
    }

    public function testCalculerExpressionComplexe(): void
    {
        $this->assertSame(7.0, $this->gestion->calculer('2+3*2-1'));
    }

    public function testCalculerDivisionParZero(): void
    {
        $this->expectException(DivisionByZeroError::class);
        $this->gestion->calculer('2/0');
    }
} 