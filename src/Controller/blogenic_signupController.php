<?php
/**
* @file
* Contains \Drupal\blogenic_signup\Controller\blogenic_signupController.
*/

namespace Drupal\blogenic_signup\Controller;
use Drupal\Core\Controller\ControllerBase;

class blogenic_signupController extends ControllerBase{
	public function signup(){

		$form_class = '\Drupal\blogenic_signup\Form\blogenic_signupForm';
		$build['form'] = \Drupal::formuilder()->getForm('\Drupal\blogenic_signup\Form\blogenic_signupForm');
		$markup = $form;
		
		return[
			'type' => 'markup', 'markup' => $markup,];
	}
}