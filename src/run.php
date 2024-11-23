<?php
/**
 * Script de lancement du programme qui utilise :
 * Calculatrice pour pouvoir accéder aux oppérateurs
 * LectureFichier pour pouvoir accéder aux données presentent dans un fichier ("input.txt")
 * GestionPrioriter pour effectuer le calculs tout en respectant les prioriters de calculs.
 */

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Calculs\Calculatrice;
use Calculs\GestionPrioriter;
use Donnees\LectureFichier;

function lireFichier(string $filename): array
{
    $lecteur = new LectureFichier($filename);
    return $lecteur->lire();
}

$filename = __DIR__ . '/input.txt';
$expressions = lireFichier($filename);

if (empty($expressions)) {
    echo "Aucune expression dans le fichier ou erreur de lecture.\n";
    exit(1);
}
$calculatrice= new Calculatrice();
$gestionPrioriter = new GestionPrioriter($calculatrice);

foreach ($expressions as $expression) {
    echo "Expression: $expression\n";
    try {
        $resultat = $gestionPrioriter->calculer($expression);
        echo "Résultat: $resultat\n";
    } catch (\Exception $e) {
        echo "Erreur lors du calcul: " . $e->getMessage() . "\n";
    }
}

echo "Fin du calcul\n";
