<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AclRole
 *
 * @ORM\Table(name="acl_role")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\Repository\AclRoleRepository")
 */
class AclRole
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idacl_role", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idaclRole;

    /**
     * @var integer
     *
     * @ORM\Column(name="idusuario", type="integer", nullable=true)
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=45, nullable=true)
     */
    private $alias;

    /**
     * @var integer
     *
     * @ORM\Column(name="idgrupo", type="integer", nullable=true)
     */
    private $idgrupo;



    /**
     * Get idaclRole
     *
     * @return integer 
     */
    public function getIdaclRole()
    {
        return $this->idaclRole;
    }

    /**
     * Set idusuario
     *
     * @param integer $idusuario
     * @return AclRole
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return AclRole
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

    /**
     * Set idgrupo
     *
     * @param integer $idgrupo
     * @return AclRole
     */
    public function setIdgrupo($idgrupo)
    {
        $this->idgrupo = $idgrupo;

        return $this;
    }

    /**
     * Get idgrupo
     *
     * @return integer 
     */
    public function getIdgrupo()
    {
        return $this->idgrupo;
    }
}
