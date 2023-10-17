<?php
// Chemin du fichier CSV source
$cheminFichierCSV = 'doc/source.csv';

// Chemin du fichier TXT de destination
$cheminFichierTXT = 'doc/destination.txt';

// Ouvrir le fichier CSV en lecture
if (($fichierCSV = fopen($cheminFichierCSV, 'r')) !== false) {
    // Ouvrir le fichier TXT en écriture
    if (($fichierTXT = fopen($cheminFichierTXT, 'w')) !== false) {
        // Lire chaque ligne du fichier CSV et l'écrire dans le fichier TXT
        while (($ligne = fgetcsv($fichierCSV)) !== false) {
            // Convertir la ligne en une chaîne de texte
            $ligneTexte = implode("\t", $ligne); // Utilisation d'une tabulation comme séparateur

            // Écrire la ligne dans le fichier TXT
            fwrite($fichierTXT, $ligneTexte . "\n"); // Ajouter un retour à la ligne
        }

        // Fermer le fichier TXT
        fclose($fichierTXT);

        echo 'Le contenu du fichier CSV a été copié dans le fichier TXT avec succès.';
    } else {
        echo 'Impossible d\'ouvrir le fichier TXT de destination pour écriture.';
    }

    // Fermer le fichier CSV
    fclose($fichierCSV);
} else {
    echo 'Impossible d\'ouvrir le fichier CSV source en lecture.';
}
?>