<?php

namespace Terceiros\Filter;

use Zend\Filter;
use Zend\Validator;

class ServicoTerceiro implements FilterInterface
{

    public function __construct(arry $arr = null)
    {
        $this->arrValidator = $arr;
    }

    public function setArryValidador(array $arr)
    {
        $this->arrValidator;
    }

    public function filter($valor)
    {
        $error = array();

        $validatorEmail = new EmaillAddress();
        // @todo valida se todos os dados obrigatorio estão presenter
        if (!in_array($valor, $this->arrValidator)) {
            $error[] = "Os dados enviados são incompletos para efetuar o cadastro.";
        }

        // @todo valida e-mail
        if (!$validatorEmail->isValid($valor['email_contato'])) {
            $error[] = $validatorEmail->getMenssage();
        }

        // @todo valida ip
        $validatorIp = new Ip();
        if (!$validatorIp->isValid($valor['ip'])) {
            $error[] = $validatorIp->getMenssage();
        }

        return $error;
    }
}
