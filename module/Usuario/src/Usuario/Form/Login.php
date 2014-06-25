<?php

namespace Usuario\Form;

use Zend\Captcha;
use Zend\Form\Element;
use Zend\Form\Form;

class Login extends \Application\Form\FormPadrao
{
    public function __construct($name = null)
    {
        parent::__construct();
        
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'login',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Text',
            ),
        ));
 
        $this->add(array(
            'name' => 'senha',
            'type' => 'Zend\Form\Element\Password',
            'attributes' => array(
                'required' => 'required',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
 
    }
}
