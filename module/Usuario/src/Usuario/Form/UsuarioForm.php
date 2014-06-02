<?php

namespace Usuario\Form\UsuarioForm;

use Zend\Form\Form;

class UsuarioForm extends Form
{

    public function __construct($name = null)
    {
        parent::__construct('');

        $this->setAttribute('method', 'post');

        $this->add(array(
                'name' => 'nome',
                'type' => 'Zend\Form\Element\Text',
                'attributes' => array(
                        'placeholder' => 'nome do usuário',
                        'required' => 'required',
                ),
                'options' => array(
                        'label' => 'Nome Usuário',
                ),
        ));

        $this->add(array(
                'name' => 'email',
                'type' => 'Zend\Form\Element\Text',
                'attributes' => array(
                        'placeholder' => 'e-mail do usuário',
                        'required' => 'required',
                ),
                'options' => array(
                        'label' => 'E-mail do usuário',
                ),
        ));

        $this->add(array(
                'name' => 'senha',
                'type' => 'Zend\Form\Element\Password',
                'attributes' => array(
                        'placeholder' => 'senha do usuario',
                        'required' => 'required',
                ),
                'options' => array(
                        'label' => 'Senha do usuário',
                ),
        ));

        $this->add(array(
                'name' => 're-senha',
                'type' => 'Zend\Form\Element\Password',
                'attributes' => array(
                        'placeholder' => 'senha do usuario',
                        'required' => 'required',
                ),
                'options' => array(
                        'label' => 'Repetir a Senha',
                ),
        ));

        $this->add(array(
                'name' => 'enviar',
                'type' => '\Zend\Form\Element\Submit',
                'attributes' => array(
                        'value' => 'Enviar Form'
                ),
                'options' => array(
                        'label' => null,
                ),
        ));

        $this->add(array(
                'name' => 'csrf',
                'type' => 'Zend\Form\Element\Csrf',
        ));
    }
}
