<?php

namespace Usuario\Model\Auth;

use Zend\Permissions\Acl\Acl;

class AclUsuario extends Acl
{

    private $acl = array(
            'Role' => array(),
            'Resource' => array(),
            'Privilege' => array(),
        );

    public static $entityName = "Usuario\Entity\Acl";

    public function setDoctrine(\Doctrine\ORM\EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function setUsuario(\Usuario\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getDoctrine()
    {
        return $this->doctrine;
    }

    public function _addRole (array $roles)
    {
        foreach ($roles as $key => $entity) {
            if (!$this->hasRole($entity->getAlias())) {
                $this->addRole($entity->getAlias());
                $this->acl['Role'][] = $entity->getAlias();
            }
        }
    }

    public function _addResource (array $permissions)
    {
        foreach ($permissions as $key => $entity) {
            if ($this->hasResource($entity->getAlias())) {
                $this->addResource($entity->getAlias());
                $this->acl['Resource'][] = $entity->getAlias();
            }
        }
    }

    public function _addPrivigele (array $privilege)
    {
        foreach ($privilege as $key => $entity) {
            if (!array_search($entity->getAlias(), $this->acl)) {
                $this->acl['Privilege'][] = $entity;
            }
        }
    }

    public function execAcl ($removeAll = true)
    {
        $reposirotyAcl = $this->getDoctrine()->getRepository(self::$entityName);
        $usuario = $this->getUsuario();
        $entityAcl = $reposirotyAcl->buscarPermissaoUsuario(
            array(
                    'idUsuario' => $usuario->getIdUsuario(),
                    'idGrupo or' => $usuario->getIdGrupo()->getIdGrupo()
            )
        );

        // Adicionando roles, resources
        foreach ($entityAcl as $key => $entity) {
            $this->_addRole($entity->getIdRole());
            $this->_addResource($entity->getIdPermission());
            $this->_addPrivigele($entity->getIdPrivilege());
        }

        $this->allow($acl['Role'], $acl['Resource'], $cl['Privilege']);


        print_r($this->getRoleRegistry());

        die;

        // foreach ($acl['Resource'] as $key => $resource) {
        //  foreach ($acl as $key2 => $role) {
        //      foreach ($acl['Privilege'] as $key3 => $privilege) {
        //          $this->allow()
        //      }
        //  }
        // }
    }
}
