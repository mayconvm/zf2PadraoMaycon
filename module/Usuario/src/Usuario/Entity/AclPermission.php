<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AclPermission
 *
 * @ORM\Table(name="acl_permission")
 * @ORM\Entity
 */
class AclPermission
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idacl_permission", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaclPermission;

    /**
     * @var string
     *
     * @ORM\Column(name="permission", type="string", length=255, nullable=true)
     */
    private $permission;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=45, nullable=true)
     */
    private $alias;



    /**
     * Get idaclPermission
     *
     * @return integer 
     */
    public function getIdaclPermission()
    {
        return $this->idaclPermission;
    }

    /**
     * Set permission
     *
     * @param string $permission
     * @return AclPermission
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;

        return $this;
    }

    /**
     * Get permission
     *
     * @return string 
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @return AclPermission
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime 
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return AclPermission
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }
}
