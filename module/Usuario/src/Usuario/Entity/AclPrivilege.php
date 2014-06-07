<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AclPrivilege
 *
 * @ORM\Table(name="acl_privilege")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\Repository\AclPrivilegeRepository")
 */
class AclPrivilege
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idacl_privilege", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaclPrivilege;

    /**
     * @var string
     *
     * @ORM\Column(name="privilege", type="string", length=45, nullable=true)
     */
    private $privilege;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=45, nullable=true)
     */
    private $alias;



    /**
     * Get idaclPrivilege
     *
     * @return integer 
     */
    public function getIdaclPrivilege()
    {
        return $this->idaclPrivilege;
    }

    /**
     * Set privilege
     *
     * @param string $privilege
     * @return AclPrivilege
     */
    public function setPrivilege($privilege)
    {
        $this->privilege = $privilege;

        return $this;
    }

    /**
     * Get privilege
     *
     * @return string 
     */
    public function getPrivilege()
    {
        return $this->privilege;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return AclPrivilege
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

    public function toArray()
    {
        return (get_class_vars(get_class($this)));
    }
}
