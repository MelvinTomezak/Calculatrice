<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Calculs\GestionPrioriter;  // Utilisation de la nouvelle classe
use Donnees\LectureFichier;

// Fonction pour lire le fichier d'entrée
function lireFichier(string $filename): array
{
    $lecteur = new LectureFichier($filename);
    return $lecteur->lire();
}

// Spécifiez le chemin vers votre fichier d'entrée
$filename = __DIR__ . '/input.txt';  // Chemin du fichier d'entrée
$expressions = lireFichier($filename);

// Vérification si des expressions ont été lues
if (empty($expressions)) {
    echo "Aucune expression dans le fichier ou erreur de lecture.\n";
    exit(1);
}

$gestionPrioriter = new GestionPrioriter();  // Création de l'objet GestionPriorites

// Traitement de chaque expression lue dans le fichier
foreach ($expressions as $expression) {
    echo "Expression: $expression\n";
    try {
        $resultat = $gestionPrioriter->calculer($expression);  // Appel à la méthode calculer
        echo "Résultat: $resultat\n";
    } catch (\Exception $e) {
        echo "Erreur lors du calcul: " . $e->getMessage() . "\n";
    }
}

echo "Fin du calcul\n";
