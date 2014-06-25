<?php

namespace Usuario\Model;

class Usuario
{

    private $doctrine;
    private $entity;
    private static $entityName = "Usuario\Entity\Usuario";
    private $mensage;
    private $isValid = false;

    public function setEntity(\Usuario\Entity\Usuario $entity)
    {
        $this->entity = $entity;
    }

    public function getEntity()
    {
        if (is_null($this->entity)) {
            $this->entity = new self::$entityName;
        }

        return $this->entity;
    }

    public function populate(array $list)
    {
        //@todo adicionar validação

        $this->getEntity()->populate($list);
    }

    public function setDoctrine(\Doctrine\ORM\EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function getDoctrine()
    {
        return $this->doctrine;
    }

    public function getRepositoryUsuario()
    {
        return $this->getDoctrine()->getRepository(self::$entityName);
    }


    public function novoUsuario(array $dados = null)
    {
        if (!is_null($dados)) {
            $this->populate($dados);
        }

        // Verifica se existe outro usuario
        $repository = $this->getDoctrine()->getRepository(self::$entityName);
        $valid = $repository->buscarUsuario(
            array(
                'usuario' => $this->getEntity()->getNome(),
            )
        );

        if (!is_null($valid)) {
            $validEmail = null;

            // Valida se ja existe outro e-mail identico
            $validEmail = $repository->buscarUsuario(
                array(
                    'email' => $this->getEntity()->getEmail()
                )
            );

            if (is_null($validEmail)) {
                $this->mensage = "E-mail já cadastrado.";
                return;
            }

            $this->mensage = "Usuário já cadastro.";
            return;
        }

        $this->isValid = true;
    }

    public function lista(array $pesquisa = array(), $order = array(), $limit = 10, $offSet = 0)
    {
        if (!empty($pesquisa)) {
            $this->populate($pesquisa);
        }

        $where = array_filter($this->getEntity()->toArray());

        $repository = $this->getRepositoryUsuario();
        $lista = $repository->findBy($where, $order, $limit, $offSet);

        return $lista;
    }

    public function buscarUsuario($idUsuario)
    {
        $busca = $this->lista(
            array(
                  'idUsuario' => $idUsuario
                )
        );
        
        return end($busca);
    }

    public function todosUsuarios()
    {
        $lista = $this->lista();

        return $lista;
    }

    public function getMensage()
    {
        return $this->mensage;
    }

    public function isValid()
    {
        return $this->isValid;
    }
}
