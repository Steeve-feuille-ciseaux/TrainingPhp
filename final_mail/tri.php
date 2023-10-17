<?php

// Fonction pour copier le contenu d'un fichier CSV dans un fichier texte
function copyCsvToTxt($sourceCsvFile, $destinationTxtFile) {
    // Ouvrir le fichier CSV en lecture
    $csv = fopen($sourceCsvFile, 'r');
    // Ouvrir le fichier texte en écriture
    $txt = fopen($destinationTxtFile, 'w');

    if ($csv !== false && $txt !== false) {
        // Lire le fichier CSV ligne par ligne
        while ($row = fgetcsv($csv)) {
            $email = $row[0];
            // Écrire l'e-mail dans le fichier texte
            fwrite($txt, $email . "\n");
        }

        // Fermer les fichiers
        fclose($csv);
        fclose($txt);

        echo "Le contenu de $sourceCsvFile a été copié dans $destinationTxtFile.\n";
    } else {
        echo "Erreur lors de l'ouverture des fichiers source ou destination.\n";
    }
}

// Appel de la fonction pour copier chaque fichier CSV dans les fichiers texte correspondants
copyCsvToTxt('mail/gmail.csv', 'mail/gmail.txt');
copyCsvToTxt('mail/orange.csv', 'mail/orange.txt');
copyCsvToTxt('mail/yahoo.csv', 'mail/yahoo.txt');
copyCsvToTxt('mail/autre.csv', 'mail/autre.txt');

?>
