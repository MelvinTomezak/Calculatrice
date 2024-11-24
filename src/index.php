<?php
/**
 * Script pour vérifier qu'il n'y a pas d'erreur dans le input.txt

 */
require_once 'Donnees/LectureFichier.php';

use Donnees\LectureFichier;

$filename = 'input.txt';

$lecteur = new LectureFichier($filename);

$lecteur->lire();
