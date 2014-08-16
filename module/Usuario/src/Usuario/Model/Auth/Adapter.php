<?php

namespace Usuario\Model\Auth;

use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class Adapter implements AdapterInterface
{
    
    private $doctrine;

    public function __construct(\Doctrine\ORM\EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    
    /**
     * Método que realiza a autenticação
     * @return Zend\Authentication\Resul
     */
    public function authenticate()
    {
        $entity = $this->doctrine->getRepository('Usuario\Entity\Usuario');

        $credential = $this->getCredential();
        $identity = $this->getIdentity();

        $valid = $entity->findOneBy(array(
            'usuario' => $identity,
            'senha' => $credential,
            'ativo' => 1
        ));

        if ($valid != null) {
            return new Result(Result::SUCCESS, $valid, array());
            
            if ($valid->getAtivo()) {
                return new Result(
                    Result::FAILURE_UNCATEGORIZED,
                    null,
                    array(
                        'O Usuário informado não está ativo.'
                    )
                );
            }
        }

        return new Result(
            Result::FAILURE_CREDENTIAL_INVALID,
            null,
            array(
                'O usuário e senha informado não são válidos.'
            )
        );
    }

    /**
     * Método para buscar qual é o usuário que está logando
     * @return string usuário que está sendo logado
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * Método que altera o usuário
     * @param string $credential Usuário a ser testado
     */
    public function setCredential($credential)
    {
        $this->credential = $credential;
    }

    /**
     * Método para bucar qual é a senha do usuário em MD5
     * @return string  Senha do usuário em MD5 
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Método para altera a senha do usuário
     * @param string $identity senha do usuário
     */
    public function setIdentity($identity)
    {
        $this->identity = md5($identity);
    }
}
