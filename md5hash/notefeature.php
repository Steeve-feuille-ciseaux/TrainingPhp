<?php declare(strict_types = 1);

namespace Drupal\import_mail\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use \Drupal\node\Entity\Node;
use \Drupal\file\Entity\File;
use Drupal\media\Entity\Media;


/**
 * Provides a Import mail form.
 */
final class ImportMailForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'import_mail_import_mail';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {

    // TITRE DE LA NEWSLETTER 
    $form['mail_titre'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Titre'),
      '#required' => TRUE,
    ];
    
    // MAIL
    $form['mail_file'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Ajouter votre fichier csv'),
      '#upload_location' => 'public://user/mail/csv', 
      '#required' => TRUE,
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'], 
        'file_validate_size' => [5 * 1024 * 1024],
      ],
    ];


    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Send'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if (mb_strlen($form_state->getValue('message')) < 10) {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('Message should be at least 10 characters.'),
    //     );
    //   }
    // @endcode
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {

    // File amail csv
    $fid_csv = $form_state->getValue('mail_file');

    // RECUPERER LE CHEMIN 

    // Récupérez le service file_system.
    $file_system = \Drupal::service('file_system');

    // Obtenez l'URI du fichier.
    $file_uri = $fid_csv['target'];

    // Vous pouvez également obtenir le chemin du fichier sur le serveur.
    //$file_path_csv = $file_system->realpath($file_uri);
    $file_path_csv = \Drupal::service('file_system')->realpath('public://user/mail/csv/mail.csv');

    /// TEST CODE MAIL TRI MAIL GMAIL

    // Chemin vers le fichier texte à créer.
    //$fid_txt_gmail = 'public://user/mail/txt/mail.txt';
    $fid_txt_gmail = \Drupal::service('file_system')->realpath('public://user/mail/txt/gmail.txt');
    $fid_txt_outlook = \Drupal::service('file_system')->realpath('public://user/mail/txt/outlook.txt');
    $fid_txt_yahoo = \Drupal::service('file_system')->realpath('public://user/mail/txt/yahoo.txt');
    $fid_txt_autre = \Drupal::service('file_system')->realpath('public://user/mail/txt/autre.txt');

    // Ouvrir le fichier CSV en lecture
    $csvFile = fopen($file_path_csv, 'r');

    // Ouvrir le fichier TXT en écriture
    $Gmailtxt = fopen($fid_txt_gmail, 'w');
    $Outlooktxt = fopen($fid_txt_outlook, 'w');
    $Yahootxt = fopen($fid_txt_yahoo, 'w');
    $Autretxt = fopen($fid_txt_autre, 'w');

    // Tableaux pour suivre les e-mails déjà écrits
    $gmailEmails = [];
    $outlookEmails = [];
    $yahooEmails = [];
    $autreEmails = [];

    while (($row = fgetcsv($csvFile)) !== false) {
      // Assurez-vous qu'il y a une colonne d'adresse e-mail dans votre fichier CSV
      foreach ($row as $column) {
        $email = trim($column);

        // Vérifiez si c'est une adresse e-mail valide
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $domain = strtolower(substr(strrchr($email, '@'), 1));

          // Trie les e-mails en fonction de leur domaine
          if ($domain === 'gmail.com' && !in_array($email, $gmailEmails)) {
            fwrite($Gmailtxt, $email . PHP_EOL);
            $gmailEmails[] = $email;
          } elseif ($domain === 'yahoo.com' && !in_array($email, $yahooEmails)) {
            fwrite($Yahootxt, $email . PHP_EOL);
            $yahooEmails[] = $email;
          } elseif ($domain === 'outlook.com' && !in_array($email, $outlookEmails)) {
            fwrite($Outlooktxt, $email . PHP_EOL);
            $outlookEmails[] = $email;
          } elseif (!in_array($email, $autreEmails)) {
            fwrite($Autretxt, $email . PHP_EOL);
            $autreEmails[] = $email;
          }
        }
      }
    }

    // Fermer le fichier TXT et CSV
    fclose($Gmailtxt);
    fclose($Outlooktxt);
    fclose($Yahootxt);
    fclose($Autretxt);
    fclose($csvFile);

    // Applique le MD5 
    $md5_gmail = md5_file($fid_txt_gmail);
    $md5_outlook = md5_file($fid_txt_outlook);
    $md5_yahoo = md5_file($fid_txt_yahoo);
    $md5_autre = md5_file($fid_txt_autre);

    // Obtenez la date de modification du fichier en tant que timestamp Unix.
    $dateGmail = filemtime($md5_gmail);
    $dateOutlook = filemtime($md5_outlook);
    $dateYahoo = filemtime($md5_yahoo);
    $dateAutre = filemtime($md5_autre);

    if ($dateGmail !== false) {
      $this->messenger()->addStatus($this->t('hash du fichier gmail ' . $md5_gmail . 'modifier le ' . date('Y-m-d H:i:s', $dateGmail)));
    } elseif ($dateOutlook !== false) {
      $this->messenger()->addStatus($this->t('hash du fichier outlook ' . $md5_outlook . 'modifier le ' . date('Y-m-d H:i:s', $dateOutlook)));
    } elseif ($dateYahoo !== false) {
      $this->messenger()->addStatus($this->t('hash du fichier yahoo ' . $md5_yahoo . 'modifier le ' . date('Y-m-d H:i:s', $dateYahoo)));
    } elseif ($dateAutre !== false) {
      $this->messenger()->addStatus($this->t('hash du fichier autre ' . $md5_autre . 'modifier le ' . date('Y-m-d H:i:s', $dateAutre)));
    }

    // FIN TEST CODE 

    $file_csv = File::load(reset($fid_csv));
    $file_csv->setPermanent();
    $file_csv->save();
    
    $file_csv = Media::create([
      'bundle' => 'document', 
      'title' => 'ficher mail csv',
      'field_media_document' => $fid_csv,
    ]);
    $file_csv->save();    

    // Create node object with attached file.
    $node = Node::create([
      'type'        => 'mail',
      'title'       => $form_state->getValue('mail_titre'),
      'field_mail' => [
        'target_id' => $file_csv->id(),
      ],
    ]);
    $node->save();

    $this->messenger()->addStatus($this->t('The message has been sent.'));
    $form_state->setRedirect('<front>');
  }

}
