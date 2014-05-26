<?php

namespace Usuario\Form;

use Zend\Form\Form;
use Zend\Form\Element\Text;
use Zend\Form\Element\Password;
use Zend\Form\Element\Button;

class Login extends Form {

	public function __construct() {
		
// 		$this->add(new Text('usuario'));
// 		$this->add(new Password('senha'));
// 		$this->add(new Button('Enviar'));
		
		return parent::__construct();
	}
}
