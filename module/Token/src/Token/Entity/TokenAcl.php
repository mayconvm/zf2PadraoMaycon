<?php

namespace Token\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TokenAcl
 *
 * @ORM\Table(name="token_acl")
 * @ORM\Entity
 */
class TokenAcl
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idtoken_acl", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtokenAcl;

    /**
     * @var \Token\Entity\AclPermission
     *
     * @ORM\ManyToOne(targetEntity="Token\Entity\AclPermission")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idpermission", referencedColumnName="idacl_permission")
     * })
     */
    private $idpermission;

    /**
     * @var \Token\Entity\AclPrivilege
     *
     * @ORM\ManyToOne(targetEntity="Token\Entity\AclPrivilege")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprivilege", referencedColumnName="idacl_privilege")
     * })
     */
    private $idprivilege;

    /**
     * @var \Token\Entity\UsuarioToken
     *
     * @ORM\ManyToOne(targetEntity="Token\Entity\UsuarioToken")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuario_token", referencedColumnName="idusuario_token")
     * })
     */
    private $idusuarioToken;



    /**
     * Get idtokenAcl
     *
     * @return integer 
     */
    public function getIdtokenAcl()
    {
        return $this->idtokenAcl;
    }

    /**
     * Set idpermission
     *
     * @param \Token\Entity\AclPermission $idpermission
     * @return TokenAcl
     */
    public function setIdpermission(\Token\Entity\AclPermission $idpermission = null)
    {
        $this->idpermission = $idpermission;

        return $this;
    }

    /**
     * Get idpermission
     *
     * @return \Token\Entity\AclPermission 
     */
    public function getIdpermission()
    {
        return $this->idpermission;
    }

    /**
     * Set idprivilege
     *
     * @param \Token\Entity\AclPrivilege $idprivilege
     * @return TokenAcl
     */
    public function setIdprivilege(\Token\Entity\AclPrivilege $idprivilege = null)
    {
        $this->idprivilege = $idprivilege;

        return $this;
    }

    /**
     * Get idprivilege
     *
     * @return \Token\Entity\AclPrivilege 
     */
    public function getIdprivilege()
    {
        return $this->idprivilege;
    }

    /**
     * Set idusuarioToken
     *
     * @param \Token\Entity\UsuarioToken $idusuarioToken
     * @return TokenAcl
     */
    public function setIdusuarioToken(\Token\Entity\UsuarioToken $idusuarioToken = null)
    {
        $this->idusuarioToken = $idusuarioToken;

        return $this;
    }

    /**
     * Get idusuarioToken
     *
     * @return \Token\Entity\UsuarioToken 
     */
    public function getIdusuarioToken()
    {
        return $this->idusuarioToken;
    }
}
