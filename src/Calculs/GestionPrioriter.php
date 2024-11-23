<?php
/**
 * Class GestionPrioriter, elle vas nous permettre de
 * calculer d'abord les parenthéses, puis les * et / et en fin les + et -
 * On appelle la class Calculatrice pour pouvoir accéder aux opérateurs.
 */
namespace Calculs;

class GestionPrioriter
{
    private Calculatrice $calculatrice;

    public function __construct(Calculatrice $calculatrice)
    {
        $this->calculatrice = $calculatrice;
    }

    public function calculer(string $expression): float
    {
        $expression = str_replace(' ', '', $expression);

        return $this->prioriter($expression);
    }

    private function prioriter(string $expression): float
    {
        while (preg_match('/\(([^()]+)\)/', $expression, $matches)) {
            $resultatParentheses = $this->prioriter($matches[1]);
            $expression = str_replace($matches[0], $resultatParentheses, $expression);
        }

        $expression = $this->calculerOperations($expression, ['*', '/']);

        $expression = $this->calculerOperations($expression, ['+', '-']);

        return (float)$expression;
    }

    private function calculerOperations(string $expression, array $operations): string
    {
        $operationsMap = $this->calculatrice->getOperations();

        $pattern = '/(-?\d+(\.\d+)?)([' . preg_quote(implode('', $operations), '/') . '])(-?\d+(\.\d+)?)/';

        while (preg_match($pattern, $expression, $matches)) {
            $gauche = (float)$matches[1];
            $op = $matches[3];
            $droite = (float)$matches[4];

            if (!array_key_exists($op, $operationsMap)) {
                throw new \InvalidArgumentException("Opérateur incorrect $op");
            }

            $operation = $operationsMap[$op];
            $resultat = $operation->calcul($gauche, $droite);

            $expression = str_replace($matches[0], (string)$resultat, $expression);
        }

        return $expression;
    }
}