<?php

declare(strict_types=1);

use Calculs\Calculatrice;
use Operateurs\Addition;
use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    public function testGetOperationsContainsAllOperators(): void
    {
        $calculatrice = new Calculatrice();
        $operations = $calculatrice->getOperations();
        $this->assertArrayHasKey('+', $operations);
        $this->assertArrayHasKey('-', $operations);
        $this->assertArrayHasKey('*', $operations);
        $this->assertArrayHasKey('/', $operations);
    }

    public function testSetOperationsOverridesOperations(): void
    {
        $calculatrice = new Calculatrice();
        $operations = ['+' => new Addition()];
        $calculatrice->setOperations($operations);
        $this->assertSame($operations, $calculatrice->getOperations());
    }
} 