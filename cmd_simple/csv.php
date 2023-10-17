<?php
// Nom du fichier CSV à créer
$nomFichierCSV = 'doc/mon_fichier.csv';

// Données à écrire dans le fichier CSV
$donnees = array(
    array('Nom', 'Prénom', 'Âge'),
    array('Doe', 'John', 30),
    array('Smith', 'Jane', 25),
    array('Brown', 'Mike', 40)
);

// Ouvrir le fichier CSV en écriture
if (($fichierCSV = fopen($nomFichierCSV, 'w')) !== false) {
    // Écrire les données dans le fichier
    foreach ($donnees as $ligne) {
        fputcsv($fichierCSV, $ligne);
    }

    // Fermer le fichier CSV
    fclose($fichierCSV);

    echo 'Le fichier CSV a été créé avec succès : ' . $nomFichierCSV;
} else {
    echo 'Impossible d\'ouvrir le fichier CSV pour écriture.';
}
?>
