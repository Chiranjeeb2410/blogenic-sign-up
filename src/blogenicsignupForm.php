<?php
/**
 * @file
 * Contains \Drupal\blogenicsignup\Form\blogenicsignupForm.
 */

namespace Drupal\blogenicsignup\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class blogenicsignupForm extends FormBase {
	 /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'blogenic-sign-up_form';
  }
  /**
   * {@inheritdoc}
   */

  public function buildForm(array $form, FormStateInterface $form_state){

  	$form['name'] = array(
      '#type' => 'textfield',
      '#title' => t('Name:'),
      '#required' => TRUE,
    );

    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Last Name:'),
      '#required' => FALSE,
    );

    $form['user_name'] = array(
      '#type' => 'textfield',
      '#title' => t('User Name:'),
      '#required' => TRUE,
    );

    $form['user_mail'] = array(
      '#type' => 'email',
      '#title' => t('Email ID:'),
      '#required' => TRUE,
    );

    $form['phone_number'] = array (
      '#type' => 'tel',
      '#title' => t('Mobile no'),
    );

    $form['user_dob'] = array (
      '#type' => 'date',
      '#title' => t('DOB'),
      '#required' => TRUE,
    );

    $form['user_gender'] = array (
      '#type' => 'select',
      '#title' => ('Gender'),
      '#options' => array(
        'Female' => t('Female'),
        'male' => t('Male'),
      ),
    );

        $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
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
