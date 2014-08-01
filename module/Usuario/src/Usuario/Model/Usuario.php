<?php

namespace Usuario\Model;

class Usuario
{

    /**
     * @var Doctrine\ORM\EntityManager
     */
    private $doctrine;

    /**
     * @var Usuario\Entity\Usuario
     */
    private $entity;

    /**
     * @var string
     */
    private static $entityName = "Usuario\Entity\Usuario";

    /**
     * @var string
     */
    private $mensage;

    /**
     * @var boolean
     */
    private $isValid = false;

    /**
     * Método da mensionar qual entidade está em uso pelo model
     * @param Usuario\Entity\Usuario $entity Entidade que estará em uso
     */
    public function setEntity(\Usuario\Entity\Usuario $entity)
    {
        $this->entity = $entity;
    }

    /**
     * Método que retorna a entidade que está em uso
     * @return Usuario\Entity\Usuario Entidade que está em uso pelo model
     */
    public function getEntity()
    {
        if (is_null($this->entity)) {
            $this->entity = new self::$entityName;
        }

        return $this->entity;
    }

    /**
     * Método para popular a entidade que está uso pelo model
     * @param  array  $list Array com os dados a serem populado
     * @return void
     */
    public function populate(array $list)
    {
        //@todo adicionar validação

        $this->getEntity()->populate($list);
    }

    /**
     * Método que mensiona qual manager do Doctrine está em uso.
     * @param DoctrineORMEntityManager $doctrine Classe do Doctrine
     */
    public function setDoctrine(\Doctrine\ORM\EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * Método para retornar qual manager do Doctrine está em uso.
     * @return Doctrine\ORM\EntityManger
     */
    public function getDoctrine()
    {
        return $this->doctrine;
    }

    /**
     * Método para retorna o repositorio da entidade usuáio
     * @return Usuario\Entity\Repository\UsuarioRepository Repositório da entidade
     */
    public function getRepositoryUsuario()
    {
        return $this->getDoctrine()->getRepository(self::$entityName);
    }

    /**
     * Método usado para valida se já existe algum usuário cadastrado
     * @return bool Verifica se pode ou cadastrar
     */
    public function validaExisteUsuario()
    {
        // Verifica se existe outro usuario
        $repository = $this->getDoctrine()->getRepository(self::$entityName);
        $valid = $repository->buscarUsuario(
            array(
                'usuario' => $this->getEntity()->getNome(),
                'email' => $this->getEntity()->getEmail()
            )
        );

        if (!is_null($valid)) {
            // Valida se ja existe outro e-mail identico
            if ($valid->getEmail() == $this->getEntity()->getEmail()) {
                $this->mensage = "E-mail já cadastrado.";
                return false;
            }

            $this->mensage = "Usuário já cadastro.";
            return false;
        }

        return true;
    }

    /**
     * Método para criar novo usuário
     * @param  array $dados array com os dados a serem inseridos
     * @return Usuario\Entity\Usuario   Entidade do usuário que foi criada.
     */
    public function novoUsuario(array $dados = null)
    {
        if (!is_null($dados)) {
            $this->populate($dados);
        }

        $valid = $this->validaExisteUsuario();

        if (!$valid) {
            return;
        }

        return $this->getEntity()->save();

        $this->isValid = true;
    }

    /**
     * Método para editar o usuário
     * @param  array  $dados     Dados do usuário a serem alterados
     * @param  integer $idUsuario Id do usuário a ser alterado
     * @return Usuario\Entity\Usuario   Entidade do usuário editado
     */
    public function editaUsuario(array $dados, $idUsuario)
    {
        $entityUsuario = $this->buscarUsuario($idUsuario);

        if (empty($entityUsuario)) {
            throw new \Exception("Nenhum usuário foi encontrado.", 1);
        }

        $this->setEntity($entityUsuario);
        $this->populate($dados);
        $this->save();

        $this->valid = true;
        $this->mensage = 'Usuário editado com sucesso!';

        return $entityUsuario;
    }

    /**
     * Método para realizar uma pesquisa de usuários
     * @param  array   $pesquisa As condições de pesquisa
     * @param  array   $order    A ordem com a qual os usuário devem ser retornados
     * @param  integer $limit    Quantidade de usuário que devem ser retornados
     * @param  integer $offSet   Quando usuário devem ser pulados na listagem
     * @return Usuario\Entity\Usuario[] Array de entidade dos usuários   
     */
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

    /**
     * Método para busca o usuário por Id
     * @param  integer $idUsuario Id do usuário
     * @return Usuario\Entity\Usuario   Entidade do usuário
     */
    public function buscarUsuario($idUsuario)
    {
        $busca = $this->lista(
            array(
                  'idUsuario' => $idUsuario
                )
        );
        
        return end($busca);
    }

    /**
     * Método para retornar todos os usários
     * @return [type] [description]
     */
    public function todosUsuarios()
    {
        $lista = $this->lista();

        return $lista;
    }

    /**
     * Retorna a mensagem de saída da ação que foi executada
     * @return string mensagem de saída
     */
    public function getMensage()
    {
        return $this->mensage;
    }

    /**
     * Valida caso a ação tenha sido executada.
     * @return boolean Valor da ação
     */
    public function isValid()
    {
        return $this->isValid;
    }
}
