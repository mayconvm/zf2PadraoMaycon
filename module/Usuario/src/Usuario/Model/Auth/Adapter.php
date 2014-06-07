<?php

namespace Usuario\Model\Auth;

use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;

class Adapter extends AbstractAdapter implements AdapterInterface
{
    
    private $drive;
    private $isValid = \Zend\Authentication\Result::FAILURE;

    public function __construct($doctrine)
    {
        $this->drive = $doctrine;
    }
    
    public function authenticate()
    {
        $entity = $this->drive->getRepository('Usuario\Entity\Usuario');

        $valid = $entity->findOneBy(array(
            'usuario' => $this->getCredential(),
            'senha' => md5($this->getIdentity()),
            'ativo' => 1
        ));

        if ($valid != null) {
            $this->isValid = \Zend\Authentication\Result::SUCCESS;
            if ($valid->getAtivo()) {
                $this->isValid = \Zend\Authentication\Result::FAILURE_CREDENTIAL_INVALID;
            }

            $this->setIdentity($valid->getIdUsuario());

            return $this;
        }
        
        return $this;
    }
    
    public function isValid()
    {
        return $this->isValid;
    }
}
