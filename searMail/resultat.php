<?php

/**
 * {@inheritdoc}
 */
public function submitForm(array &$form, FormStateInterface $form_state): void {
    $find_mail = $form_state->getValue('find_mail');

    // ... Votre logique de recherche ...

    // Variable qui définit si le mail a été trouvé
    $result_search = 0;

    // Recherche si le mail attendu existe
    foreach ($mail_box as $wanted_mail) {
        $find_mail = strtolower($find_mail);
        if ($wanted_mail === $find_mail) {
            $result_search = $result_search + 1;
        } else {
            $result_search = $result_search + 0;
        }
    }

    // SOLUCE 1 
    // Afficher le résultat au-dessus du bouton Rechercher
    $form_state->set('result_message', 'Le résultat de la recherche est...');
    // ... Votre logique de résultat ...

    // SOLUCE 2
    // Afficher le résultat en dessous du bouton Rechercher
    $form_state->set('result_message', $result_message);
}
