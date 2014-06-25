<?php

namespace Application\Form;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class FormPadrao extends \Zend\Form\Form
{
    public function __construct()
    {
        parent::__construct();
        
        $this->add(array(
            'name' => 'csrf',
            'type' => '\Zend\Form\Element\Csrf',
        ));
    }
}
