<?php

/**
* @file
* Contains \Drupal\blogenic_signup\Controller\BlogenicSignupController.
*/

namespace Drupal\blogenic_signup\Controller;

use Drupal\Core\Controller\ControllerBase;

class BlogenicSignupController extends ControllerBase  {

  public function signup() {
    $form_class = '\Drupal\blogenic_signup\Form\BlogenicSignupForm';
    $build['form'] = \Drupal::formBuilder()->getForm('\Drupal\blogenic_signup\Form\BlogenicSignupForm');
    $markup = $form;

    return [
      'type' => 'markup',
      'markup' => $markup,
    ];
  }

}
