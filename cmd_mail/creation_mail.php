<?php

// Nom du fichier CSV de destination
$csvFilePath = 'mail.csv';

// Ouvrir le fichier en écriture
$csvFile = fopen($csvFilePath, 'w');

if ($csvFile !== false) {
    // En-tête du fichier CSV
    fputcsv($csvFile, ['Adresse Email', 'Type']);

    // Générer 10 adresses Gmail
    for ($i = 1; $i <= 10; $i++) {
        $email = "gmail_user{$i}@gmail.com";
        fputcsv($csvFile, [$email, 'Gmail']);
    }

    // Générer 10 adresses Yahoo
    for ($i = 1; $i <= 10; $i++) {
        $email = "yahoo_user{$i}@yahoo.com";
        fputcsv($csvFile, [$email, 'Yahoo']);
    }

    // Générer 10 adresses Orange
    for ($i = 1; $i <= 10; $i++) {
        $email = "orange_user{$i}@orange.fr";
        fputcsv($csvFile, [$email, 'Orange']);
    }

    // Générer 5 adresses email aléatoires
    for ($i = 1; $i <= 5; $i++) {
        $email = generateRandomEmail();
        fputcsv($csvFile, [$email, 'Aléatoire']);
    }

    // Fermer le fichier CSV
    fclose($csvFile);

    echo "Le fichier mail.csv a été créé avec succès.";
} else {
    echo "Erreur lors de l'ouverture du fichier en écriture.";
}

function generateRandomEmail() {
    $providers = ['gmail.com', 'yahoo.com', 'orange.fr', 'hotmail.com', 'example.com', 'test.org'];
    $randomProvider = $providers[array_rand($providers)];
    $username = generateRandomString(8);
    return $username . '@' . $randomProvider;
}

function generateRandomString($length) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
?>
