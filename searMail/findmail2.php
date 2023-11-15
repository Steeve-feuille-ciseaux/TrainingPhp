<?php
// Assurez-vous de remplacer $find_mail et $mail_box par les valeurs réelles.
$find_mail = strtolower($find_mail);
$result_search = 0;

// RECHERCHE SI LE MAIL ATTENDU EXISTE
foreach ($mail_box as $wanted_mail) {
  // Convertir la lettre en minuscule pour une comparaison insensible à la casse.
  $wanted_mail = strtolower($wanted_mail);

  if ($wanted_mail === $find_mail) {
    $result_search++;
  }
}

if (empty($mail_box)) {
  $this->messenger()->addStatus($this->t($find_mail . 'votre agenda de mail est vide '));
}

if ($result_search > 0) {
  $this->messenger()->addStatus($this->t($find_mail . ' est dans cette agenda ' . $result_search . ' fois'));
} else {
  $this->messenger()->addStatus($this->t($find_mail . ' n\'a pas été trouvé'));
}
