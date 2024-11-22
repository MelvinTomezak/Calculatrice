<?php

namespace Donnees;

class LectureFichier
{
    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function lire(): array
    {
        // Vérifier si le fichier existe
        if (!file_exists($this->filename)) {
            echo "Le fichier {$this->filename} n'existe pas.\n";
            return []; // Retourner un tableau vide en cas d'erreur
        }

        // Ouvrir le fichier en mode lecture
        $file = fopen($this->filename, 'r');
        if (!$file) {
            echo "Impossible d'ouvrir le fichier {$this->filename}.\n";
            return []; // Retourner un tableau vide en cas d'erreur
        }

        $expressions = [];
        // Lire chaque ligne et la stocker dans un tableau
        while (($ligne = fgets($file)) !== false) {
            $ligne = trim($ligne); // Enlever les espaces et retours à la ligne inutiles
            if ($ligne !== '') {
                $expressions[] = $ligne; // Ajouter l'expression au tableau
            }
        }

        fclose($file);
        return $expressions;
    }
}
