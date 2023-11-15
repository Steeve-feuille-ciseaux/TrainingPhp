<?php

function searchEmailInFile($email, $filename) {
    $file = fopen($filename, "r");

    if ($file) {
        while (!feof($file)) {
            $line = trim(fgets($file));

            if ($line === $email) {
                fclose($file);
                return true;
            }
        }

        fclose($file);
    }

    return false;
}

function searchEmail($email) {
    $providers = ['gmail', 'yahoo', 'outlook', 'ovh'];
    $found = false;

    foreach ($providers as $provider) {
        $filename = $provider . '.txt';
        $found = searchEmailInFile($email, $filename);

        if ($found) {
            break;
        }
    }

    return $found;
}

// Exemple d'utilisation
$emailToSearch = 'test@gmail.com';

if (searchEmail($emailToSearch)) {
    echo "L'adresse e-mail a été trouvée.";
} else {
    echo "L'adresse e-mail n'a pas été trouvée.";
}
?>
