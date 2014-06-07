<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Acl
 *
 * @ORM\Table(name="acl")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\Repository\AclRepository")
 */
class Acl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idacl", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idacl;

    /**
     * @var integer
     *
     * @ORM\Column(name="idgrupo", type="integer", nullable=false)
     */
    private $idgrupo;

    /**
     * @var \Usuario\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario")
     * })
     */
    private $idusuario;

    /**
     * @var \Usuario\Entity\AclPermission
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\AclPermission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpermission", referencedColumnName="idacl_permission")
     * })
     */
    private $idpermission;

    /**
     * @var \Usuario\Entity\AclPrivilege
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\AclPrivilege")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprivilege", referencedColumnName="idacl_privilege")
     * })
     */
    private $idprivilege;

    /**
     * @var \Usuario\Entity\AclRole
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\AclRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idrole", referencedColumnName="idacl_role")
     * })
     */
    private $idrole;



    /**
     * Get idacl
     *
     * @return integer 
     */
    public function getIdacl()
    {
        return $this->idacl;
    }

    /**
     * Set idgrupo
     *
     * @param integer $idgrupo
     * @return Acl
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

    /**
     * Set idusuario
     *
     * @param \Usuario\Entity\Usuario $idusuario
     * @return Acl
     */
    public function setIdusuario(\Usuario\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \Usuario\Entity\Usuario 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set idpermission
     *
     * @param \Usuario\Entity\AclPermission $idpermission
     * @return Acl
     */
    public function setIdpermission(\Usuario\Entity\AclPermission $idpermission = null)
    {
        $this->idpermission = $idpermission;

        return $this;
    }

    /**
     * Get idpermission
     *
     * @return \Usuario\Entity\AclPermission 
     */
    public function getIdpermission()
    {
        return $this->idpermission;
    }

    /**
     * Set idprivilege
     *
     * @param \Usuario\Entity\AclPrivilege $idprivilege
     * @return Acl
     */
    public function setIdprivilege(\Usuario\Entity\AclPrivilege $idprivilege = null)
    {
        $this->idprivilege = $idprivilege;

        return $this;
    }

    /**
     * Get idprivilege
     *
     * @return \Usuario\Entity\AclPrivilege 
     */
    public function getIdprivilege()
    {
        return $this->idprivilege;
    }

    /**
     * Set idrole
     *
     * @param \Usuario\Entity\AclRole $idrole
     * @return Acl
     */
    public function setIdrole(\Usuario\Entity\AclRole $idrole = null)
    {
        $this->idrole = $idrole;

        return $this;
    }

    /**
     * Get idrole
     *
     * @return \Usuario\Entity\AclRole 
     */
    public function getIdrole()
    {
        return $this->idrole;
    }
}
