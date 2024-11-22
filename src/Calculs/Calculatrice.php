<?php

namespace Calculs;

use Operateurs\Addition;
use Operateurs\Division;
use Operateurs\Multiplication;
use Operateurs\Soustraction;
class Calculatrice
{
    private array $operations = [];

    public function __construct()
    {
        $this->operations = [
            '+' => new Addition(),
            '-' => new Soustraction(),
            '*' => new Multiplication(),
            '/' => new Division()
        ];
    }

    public function getOperations(): array
    {
        return $this->operations;
    }

    public function setOperations(array $operations): void
    {
        $this->operations = $operations;
    }
}