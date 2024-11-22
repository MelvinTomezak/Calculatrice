<?php

require_once 'Donnees/LectureFichier.php'; // Le bon chemin relatif

use Donnees\LectureFichier; // Assurez-vous que le namespace est correct

// Définir le chemin du fichier à lire
$filename = 'input.txt';

// Créer une instance de LectureFichier
$lecteur = new LectureFichier($filename);

// Lire et afficher le contenu du fichier
$lecteur->lire();
