<?php
// Chemin vers le fichier texte à créer.
$nomFichier = 'doc/mon_fichier.txt';

// Contenu à écrire dans le fichier.
$contenu = "Hello, World!\nCeci est un fichier texte créé en PHP.";

// Ouvre le fichier en écriture (le crée s'il n'existe pas).
$handle = fopen($nomFichier, 'w');

// Vérifie si l'ouverture du fichier a réussi.
if ($handle === false) {
    die('Impossible d\'ouvrir le fichier.');
}

// Écrit le contenu dans le fichier.
if (fwrite($handle, $contenu) === false) {
    die('Impossible d\'écrire dans le fichier.');
}

// Ferme le fichier.
fclose($handle);

echo 'Le fichier texte a été créé et le contenu a été écrit avec succès.';
?>
