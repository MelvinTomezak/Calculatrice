<?php
/**
 * La class LectureFichier permet de récupérer les données pour effectuer un calcul
 * présente dans un fichier texte. (Exemple 3 *2, ...)
 */

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
        if (!file_exists($this->filename)) {
            echo "Pas de fichier {$this->filename} ";
            return [];
        }

        $file = fopen($this->filename, 'r');
        if (!$file) {
            echo "Fichier pas trouver {$this->filename}";
            return [];
        }

        $expressions = [];
        while (($ligne = fgets($file)) !== false) {
            $ligne = trim($ligne);
            if ($ligne !== '') {
                $expressions[] = $ligne;
            }
        }

        fclose($file);
        return $expressions;
    }
}
