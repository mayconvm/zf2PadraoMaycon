<?php

namespace Usuario\Model\Auth;

use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Zend\Permissions\Acl\Resource\GenericResource as Resource;

class AclUsuario extends Acl
{

    private $acl = array(
            'Role' => array(),
            'Resource' => array(),
            'Privilege' => array(),
        );

    public static $entityName = "Usuario\Entity\Acl";
    public static $entityNameRole = 'Usuario\Entity\AclRole';
    public static $entityNameResource = 'Usuario\Entity\AclResource';
    public static $entityNamePrivilege = 'Usuario\Entity\AclPrivilege';

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

    public function getRole()
    {
        return $this->acl['Role'];
    }

    public function getResource()
    {
        return $this->acl['Resource'];
    }

    public function getPrivilege()
    {
        $repositoryPrivilege = $this->getDoctrine()->getRepository(self::$entityNamePrivilege);
        return $repositoryPrivilege->buscarPermissao(
            array(
                'alias' => $this->acl['Privilege']
            )
        );
    }

    public function _addRole (\Usuario\Entity\AclRole $roles)
    {
        if (!$this->hasRole($roles->getAlias())) {
            $this->addRole($roles->getAlias());
            $this->acl['Role'][] = new Role($roles->getAlias());
        }
    }

    public function _addResource (\Usuario\Entity\AclPermission $permissions)
    {
        if ($this->hasResource($permissions->getAlias())) {
            $this->addResource($permissions->getAlias());
            $this->acl['Resource'][] = new Resource($permissions->getAlias());
        }
    }

    public function _addPrivigele (\Usuario\Entity\AclPrivilege $privilege)
    {
        if (!array_search($privilege->getAlias(), $this->acl)) {
            $this->acl['Privilege'][] = $privilege->getAlias();
        }
    }

    public function getRoleUsuario()
    {
        $repositoryRole = $this->getDoctrine()->getRepository(self::$entityNameRole);
        $role = $repositoryRole->buscarRole(
            array(
                    'idusuario' => $this->getUsuario()->getIdUsuario()
                )
        );

        return $role;
    }

    public function execAcl ($removeAll = true)
    {
        $usuario = $this->getUsuario();

        // Valida se existe Role
        $role = $this->getRoleUsuario();
        if (is_null($role)) {
            die("Usuário sem ROLE");
        }

        $where = array(
            'idrole' => $role->getIdaclRole()
        );

        $idGrupo = $usuario->getIdGrupo();
        if (!is_null($idGrupo)) {
            // $where['idgrupo or'] = $idGrupo->getIdGrupo();
        }

        $reposirotyAcl = $this->getDoctrine()->getRepository(self::$entityName);
        $entityAcl = $reposirotyAcl->buscarPermissaoUsuario($where);
        
        // Adicionando roles, resources
        foreach ($entityAcl as $key => $entity) {
            $this->_addRole($entity->getIdRole());
            $this->_addResource($entity->getIdPermission());
            $this->_addPrivigele($entity->getIdPrivilege());
        }

        $this->allow($this->acl['Role'], $this->acl['Resource'], $this->acl['Privilege']);

        // foreach ($acl['Resource'] as $key => $resource) {
        //  foreach ($acl as $key2 => $role) {
        //      foreach ($acl['Privilege'] as $key3 => $privilege) {
        //          $this->allow()
        //      }
        //  }
        // }
    }
}
