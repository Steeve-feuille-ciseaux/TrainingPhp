<?php
/**
 * {@inheritdoc}
 */
public function submitForm(array &$form, FormStateInterface $form_state): void {
    // ... (votre code existant)
  
    if ($result_search != 0) {
      // Retirer l'adresse e-mail trouvée du tableau $mail_box
      $mail_box = array_diff($mail_box, [$find_mail]);
  
      // ... (le reste de votre code)
    } else {
      $this->messenger()->addStatus($this->t($find_mail . ' n\'a pas été trouvé'));
    }
  
    // ... (le reste de votre code)
  }
  