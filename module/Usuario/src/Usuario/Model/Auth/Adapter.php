<?php

namespace Usuario\Model\Auth;

use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class Adapter implements AdapterInterface
{
    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $doctrine;

    /**
     * @var String
     */
    private $identity;

    /**
     * @var string
     */
    private $credential;

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

        echo $identity;

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
     * Método para buscar qual é senha
     * @return string senha que está sendo usada
     */
    public function getCredential()
    {
        return $this->credential;
    }

    /**
     * Método que altera a senha
     * @param string $credential Senha a ser testado
     */
    public function setCredential($credential)
    {
        $this->credential = md5($credential);
    }

    /**
     * Método para bucar qual é o usuário
     * @return string  Usuário 
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * Método para altera é o úsuário
     * @param string $identity usuário
     */
    public function setIdentity($identity)
    {
        $this->identity = md5($identity);
    }
}
