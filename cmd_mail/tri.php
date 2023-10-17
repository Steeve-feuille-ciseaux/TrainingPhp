<?php

// Ouvrir le fichier d'origine en lecture
$sourceFile = 'mail.csv';
$sourceCsv = fopen($sourceFile, 'r');

if ($sourceCsv !== false) {
    // Ouvrir les fichiers de destination
    $gmailCsv = fopen('mail/gmail.csv', 'w');
    $yahooCsv = fopen('mail/yahoo.csv', 'w');
    $orangeCsv = fopen('mail/orange.csv', 'w');
    $autreCsv = fopen('mail/autre.csv', 'w');

    // En-têtes des fichiers de destination
    fputcsv($gmailCsv, ['Adresse Email']);
    fputcsv($yahooCsv, ['Adresse Email']);
    fputcsv($orangeCsv, ['Adresse Email']);
    fputcsv($autreCsv, ['Adresse Email']);

    // Lire le fichier source ligne par ligne
    while ($row = fgetcsv($sourceCsv)) {
        $email = $row[0];
        $type = $row[1];

        // Écrire l'email dans le fichier approprié en fonction du type
        if ($type === 'Gmail') {
            fputcsv($gmailCsv, [$email]);
        } elseif ($type === 'Yahoo') {
            fputcsv($yahooCsv, [$email]);
        } elseif ($type === 'Orange') {
            fputcsv($orangeCsv, [$email]);
        } else {
            fputcsv($autreCsv, [$email]);
        }
    }

    // Fermer tous les fichiers CSV
    fclose($sourceCsv);
    fclose($gmailCsv);
    fclose($yahooCsv);
    fclose($orangeCsv);
    fclose($autreCsv);

    echo "Les emails ont été copiés et séparés en fichiers Gmail, Yahoo, Orange et Autre.";
} else {
    echo "Erreur lors de l'ouverture du fichier source en lecture.";
}

?>
