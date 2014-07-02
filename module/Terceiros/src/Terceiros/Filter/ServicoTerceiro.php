<?php

namespace Terceiros\Filter;

use Zend\Filter\FilterInterface;
use Zend\Validator\EmailAddress;
use Zend\Validator\Ip;

class ServicoTerceiro implements FilterInterface
{

    private $arrValidator;

    public function __construct(array $arr = null)
    {
        $this->setArryValidador($arr);
    }

    public function setArryValidador(array $arr)
    {
        $this->arrValidator = $arr;
    }

    public function filter($valor)
    {
        $error = array();

        // @todo valida se todos os dados obrigatorio estão presenter
        if (!isset($valor['titulo'])) {
            $error[] = "O campo titulo é obrigatório.";
        }

        if (!isset($valor['ip'])) {
            $error[] = "O campo ip é obrigatório.";
        }

        if (!isset($valor['emailContato'])) {
            $error[] = "O campo emailContato é obrigatório.";
        }

        if (!isset($valor['idusuario'])) {
            $error[] = "O campo idusuario é obrigatório.";
        }

        // @todo valida e-mail
        $validatorEmail = new EmailAddress();
        if (empty($error) and !$validatorEmail->isValid($valor['emailContato'])) {
            $error[] = $validatorEmail->getMessages();
        }

        // @todo valida ip
        $validatorIp = new Ip();
        if (empty($error) and !$validatorIp->isValid($valor['ip'])) {
            $error[] = $validatorIp->getMessages();
        }

        return $error;
    }
}
