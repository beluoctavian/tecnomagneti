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
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => t('Nume'),
      '#required' => TRUE,
      '#maxlength' => 255,
    ];
    $form['mail'] = [
      '#type' => 'textfield',
      '#title' => t('E-mail'),
      '#required' => TRUE,
      '#maxlength' => 255,
    ];
    $form['phone'] = [
      '#type' => 'textfield',
      '#title' => t('Telefon'),
      '#required' => FALSE,
      '#maxlength' => 255,
    ];
    $form['message'] = [
      '#type' => 'textarea',
      '#title' => t('Mesaj'),
      '#required' => TRUE,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => t('Trimite mesajul'),
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
  }
}