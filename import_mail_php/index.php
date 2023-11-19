<!DOCTYPE html>
<html>
<head>
    <title>Importation CSV</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h2>Importation de la liste d'adresses e-mail depuis un fichier CSV</h2>

    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="csv_file">ajoutez un fichier CSV :</label>
        <br />
        <input type="file" name="csv_file" id="csv_file" accept=".txt">
        <br>
        <input type="submit" value="Importer">
    </form>

<?php
// Vérifier si le formulaire a été soumis
if (isset($_FILES['csv_file']) && $_FILES['csv_file']['error'] == 0) {
    
    // Chemin du fichier temporaire
    $tmp_file = $_FILES['csv_file']['tmp_name'];

    // Emplacement où vous souhaitez déplacer le fichier
    $project_directory = $_SERVER['DOCUMENT_ROOT'] . '/spreadsheet/import_mail_php/';
    $target_directory = $project_directory . 'uploads/';

    // Créer le répertoire s'il n'existe pas
    if (!file_exists($target_directory)) {
        mkdir($target_directory, 0777, true); // Assurez-vous d'ajuster les permissions selon vos besoins
    }

    // Nom du fichier après le déplacement
    $target_file = $target_directory . basename($_FILES['csv_file']['name']);

    // Déplacer le fichier vers l'emplacement spécifié
    if (move_uploaded_file($tmp_file, $target_file)) {
        echo "Le fichier a été importé avec succès. Emplacement : " . $target_file;

        // Lire le contenu du fichier CSV dans un tableau
        $csv_content = file($target_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $mail = $csv_content;

        // Afficher le contenu du tableau (à titre de démonstration)
        echo "<pre>";
        print_r($mail);
        echo "</pre>";

        // Emplacement du fichier texte
        $txt_file = $project_directory . 'uploads/content.txt';

        // Écrire le contenu du tableau dans le fichier texte
        file_put_contents($txt_file, implode(PHP_EOL, $csv_content));

        echo "Le contenu du fichier a été écrit dans content.txt.";

        // Vous pouvez placer cette partie dans une condition si nécessaire
        // pour éviter de trier à chaque chargement de la page
        // ...

    } else {
        echo "Erreur lors du déplacement du fichier.";
    }
} else {
    echo "Veuillez sélectionner un fichier CSV valide.";
}

// La deuxième partie du code, pour trier les e-mails, commence ici

// Emplacement du fichier texte
$txt_file = $project_directory . 'uploads/content.txt';

// Ouvrir le fichier en mode lecture
$file_handle = fopen($txt_file, 'r');

// Vérifier si le fichier a été ouvert avec succès
if ($file_handle) {
    // Initialiser les tableaux pour chaque domaine
    $gmail_emails = [];
    $yahoo_emails = [];
    $outlook_emails = [];
    $ovh_emails = [];

    // Lire le fichier ligne par ligne
    while (($email = fgets($file_handle)) !== false) {
        // Supprimer les espaces et les sauts de ligne en début et fin de ligne
        $email = trim($email);

        // Récupérer le domaine de l'adresse e-mail
        $domain = strtolower(substr(strrchr($email, "@"), 1));

        // Trier l'adresse e-mail dans le tableau approprié
        switch ($domain) {
            case 'gmail.com':
                $gmail_emails[] = $email;
                break;
            case 'yahoo.com':
                $yahoo_emails[] = $email;
                break;
            case 'outlook.com':
                $outlook_emails[] = $email;
                break;
            default:
                $ovh_emails[] = $email;
                break;
        }
    }

    // Fermer le fichier
    fclose($file_handle);

    // Afficher les tableaux triés
    echo "<pre>";
    echo count($gmail_emails) . " Gmail Emails: " . print_r($gmail_emails, true) . PHP_EOL;
    echo count($yahoo_emails) . " Yahoo Emails: " . print_r($yahoo_emails, true) . PHP_EOL;
    echo count($outlook_emails) . " Outlook Emails: " . print_r($outlook_emails, true) . PHP_EOL;
    echo count($ovh_emails) . " Ovh Emails: " . print_r($ovh_emails, true) . PHP_EOL;
    echo "</pre>";
} else {
    echo "Erreur lors de l'ouverture du fichier.";
}
?>

<h2>Résultats de Tri des Adresses E-mail</h2>

<h3>Adresses E-mail Gmail Triées :</h3>
    <table>
        <tr>
            <th>Numéro</th>
            <th>Adresse E-mail</th>
        </tr>
        <?php
        // Afficher les adresses e-mail Gmail triées dans la table
        foreach ($gmail_emails as $index => $email) {
            echo "<tr>";
            echo "<td>" . ($index + 1) . "</td>";
            echo "<td>$email</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
