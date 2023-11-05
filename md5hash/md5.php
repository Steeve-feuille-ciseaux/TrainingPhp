<?php

// Nom du fichier CSV de destination
$csvFilePath = 'mail.csv';

$md5Hash = md5_file($csvFilePath);

echo 'Le fichier est : ' . $csvFilePath . '<br>';
echo 'Le hash MD5 du fichier est : ' . $md5Hash. '<br>'. '<br>';

// Obtenez la date de modification du fichier en tant que timestamp Unix.
$dateModification = filemtime($csvFilePath);

if ($dateModification !== false) {
    echo 'Le fichier a été modifié pour la dernière fois le : ' . date('Y-m-d H:i:s', $dateModification);
} else {
    echo 'Impossible d\'obtenir la date de modification du fichier.';
}

