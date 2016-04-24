<?php

namespace Drupal\tecnomagneti\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\UrlHelper;

/**
 * Contact form.
 */
class ContactForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'tecnomagneti_contact_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['container'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => [
          'row'
        ],
      ],
    ];
    $form['container']['details'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => [
          'col-xs-12',
          'col-sm-6',
        ],
      ],
      'title' => [
        '#markup' => '<h3>TECNOMAGNETI S.R.L</h3>',
      ],
      'address' => [
        '#markup' => '<div><span class="glyphicon glyphicon-home"></span> <b>Adresa:</b> Str. Aleea Industriilor nr 5, Buzãu</div>',
      ],
      'phone' => [
        '#markup' => '
<div>
  <span class="glyphicon glyphicon-earphone"></span> <b>Telefon:</b>
  <ul>
      <li>0724148440  - Mihai Ovidiu Damian</li>
      <li>0720547586 - Popa Nicolae</li>
      <li>0741639762 - Lorento Iacob</li>
      <li>0745110506 - Dumitru Belu</li>
  </ul>
</div>',
      ],
      'fax' => [
        '#markup' => '<div><span class="glyphicon glyphicon-print"></span> <b>Tel/Fax:</b> 0338-101321 </div>'
      ],
      'mail' => [
        '#markup' => '
<div>
  <span class="glyphicon glyphicon-envelope"></span> <b>E-mail:</b>
  <ul>
      <li>office@tecnomagneti.ro </li>
      <li>mihai.damian@tecnomagneti.ro</li>
      <li>nicolae.popa@tecnomagneti.ro</li>
      <li>lorento.iacob@tecnomagneti.ro</li>
      <li>dan.belu@tecnomagneti.ro</li>
  </ul>
</div>'
      ],
    ];

    $form['container']['form'] = [
      '#type' => 'container',
      '#attributes' => [
        'class' => [
          'col-xs-12',
          'col-sm-6',
        ],
      ],
      'name' => [
        '#type' => 'textfield',
        '#title' => t('Nume'),
        '#required' => TRUE,
        '#maxlength' => 255,
      ],
      'mail' => [
        '#type' => 'textfield',
        '#title' => t('E-mail'),
        '#required' => TRUE,
        '#maxlength' => 255,
      ],
      'phone' => [
        '#type' => 'textfield',
        '#title' => t('Telefon'),
        '#required' => FALSE,
        '#maxlength' => 255,
      ],
      'message' => [
        '#type' => 'textarea',
        '#title' => t('Mesaj'),
        '#required' => TRUE,
      ],
      'submit' => [
        '#type' => 'submit',
        '#value' => t('Trimite mesajul'),
      ],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $to = \Drupal::config('system.site')->get('mail');
    $message = \Drupal::service('plugin.manager.mail')->mail('tecnomagneti', 'notice', $to, $langcode, $form_state->getValues(), FALSE);
    if ($message['result']) {
      drupal_set_message('Mesajul a fost trimis cu succes!');
    }
    else {
      drupal_set_message('Mesajul nu a putut fi trimis.', 'error');
    }
  }
}