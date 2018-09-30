<?php

namespace Drupal\blogenic_signup\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class BlogenicSignupForm.
 */
class BlogenicSignupForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'blogenic_signup_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state){
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name:'),
      '#required' => TRUE,
    ];

    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name:'),
      '#required' => FALSE,
    ];

    $form['user_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('User Name:'),
      '#required' => TRUE,
    ];

    $form['user_mail'] = [
      '#type' => 'email',
      '#title' => $this->t('Email ID:'),
      '#required' => TRUE,
    ];

    $form['user_number'] = [
      '#type' => 'tel',
      '#title' => $this->t('Mobile no'),
    ];

    $form['user_dob'] = [
      '#type' => 'date',
      '#title' => $this->t('DoB'),
      '#required' => TRUE,
    ];

    $form['user_gender'] = [
      '#type' => 'select',
      '#title' => $this->t('Gender'),
      '#attributes' => ['class' => ['select-bbq-selector']],
      '#empty_option' => 'Select',
      '#options' => [
        'Male' => $this->t('Male'),
        'Female' => $this->t('Female'),
        'Other' => $this->t('Other'),
      ],
    ];

    $form['actions']['#type'] = 'actions';

    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    ];
    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (strlen($form_state->getValue('user_number')) < 10) {
      $form_state->setErrorByName('user_number', $this->t('Mobile number is invalid.'));
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }

}
