<?php

/**
 * Replace the email in the given file with a new value.
 *
 * @param string $filePath
 *   The path to the file.
 * @param string $oldEmail
 *   The old email to replace.
 * @param string $newEmail
 *   The new email to use for replacement.
 */
private function replaceEmailInFile($filePath, $oldEmail, $newEmail) {
    $fileContent = file_get_contents($filePath);
    $newContent = str_replace($oldEmail, $newEmail, $fileContent);
    file_put_contents($filePath, $newContent);
}

/**
 * {@inheritdoc}
 */
public function submitForm(array &$form, FormStateInterface $form_state): void {
    // ...

    // Remplacer l'adresse e-mail recherchée par une autre valeur
    $find_mail = strtolower($replace);

    // RECUPERE LE NODE MAIL FILTER LIE A USER ACTUEL 
    $query_mail_list = \Drupal::entityQuery('node')->condition('type', 'mail_client')->condition('field_mail_user', $uid); 
    $query_mail_list->accessCheck(TRUE);
    $nid_mail_list = $query_mail_list->execute();
    $mail_list = \Drupal\node\Entity\Node::loadMultiple($nid_mail_list);
    
    // ...

    // REPLACE EMAIL IN FILE
    foreach ($mail_list as $mail_show) {
        $mail_filter = $mail_show->get('field_mail_filter')->referencedEntities();
        foreach ($mail_filter as $mail_file_txt) {
            $mail_content = $mail_file_txt->get('field_mail_f_txt')->referencedEntities();
            // NODE TXT + FID TXT
            foreach ($mail_content as $mail) {
                $fid = $mail->get('field_media_document')->target_id;
                $file = File::load($fid);
                $path = $file->getFileUri();

                // REPLACE EMAIL IN FILE
                $this->replaceEmailInFile($path, $oldEmail, $newEmail);
            }
        }
    }

    // ...
}
