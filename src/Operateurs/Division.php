<?php

declare(strict_types=1);

namespace Operateurs;

use Interfaces\InterfaceOperations;

class Division implements InterfaceOperations
{
    public function calcul(float $a, float $b): float
    {
        return $a /$b;
    }
}