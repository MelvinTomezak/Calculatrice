<?php

namespace Calculs;

class GestionPrioriter
{
    public function calculer(string $expression): float
    {
        // Suppression des espaces
        $expression = str_replace(' ', '', $expression);

        // Évaluation de l'expression avec respect des priorités (parenthèses, *, /, +, -)
        return $this->evaluer($expression);
    }

    private function evaluer(string $expression): float
    {
        // Résoudre les parenthèses en premier
        while (preg_match('/\(([^()]+)\)/', $expression, $matches)) {
            // Appliquer récursivement l'évaluation sur les parenthèses
            $resultatParentheses = $this->evaluer($matches[1]);
            $expression = str_replace($matches[0], $resultatParentheses, $expression);
        }

        // Calculer la multiplication et la division
        $expression = $this->calculerOperations($expression, ['*', '/']);

        // Calculer l'addition et la soustraction
        $expression = $this->calculerOperations($expression, ['+', '-']);

        // Retourner le résultat final
        return (float)$expression;
    }

    private function calculerOperations(string $expression, array $operations): string
    {
        foreach ($operations as $op) {
            // Trouver toutes les occurrences de l'opération (ex: a * b, a / b, a + b, a - b)
            while (preg_match('/(-?\d+(\.\d+)?)\s*' . preg_quote($op, '/') . '\s*(-?\d+(\.\d+)?)/', $expression, $matches)) {
                $a = (float)$matches[1];
                $b = (float)$matches[3];

                // Effectuer l'opération en fonction de l'opérateur
                switch ($op) {
                    case '*':
                        $resultat = $a * $b;
                        break;
                    case '/':
                        if ($b == 0) {
                            throw new \InvalidArgumentException("Division par zéro");
                        }
                        $resultat = $a / $b;
                        break;
                    case '+':
                        $resultat = $a + $b;
                        break;
                    case '-':
                        $resultat = $a - $b;
                        break;
                    default:
                        throw new \InvalidArgumentException("Opérateur inconnu");
                }

                // Remplacer l'opération dans l'expression par le résultat
                $expression = preg_replace('/' . preg_quote($matches[0], '/') . '/', (string)$resultat, $expression, 1);
            }
        }

        return $expression;
    }
}
