<?php

namespace Grupo\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grupo
 *
 * @ORM\Table(name="grupo")
 * @ORM\Entity
 */
class Grupo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idgrupo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idgrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo", type="string", length=45, nullable=true)
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=45, nullable=true)
     */
    private $alias;

    /**
     * @var integer
     *
     * @ORM\Column(name="ativo", type="integer", nullable=true)
     */
    private $ativo;



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
     * Set grupo
     *
     * @param string $grupo
     * @return Grupo
     */
    public function setGrupo($grupo)
    {
        $this->grupo = $grupo;

        return $this;
    }

    /**
     * Get grupo
     *
     * @return string 
     */
    public function getGrupo()
    {
        return $this->grupo;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Grupo
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
     * Set ativo
     *
     * @param integer $ativo
     * @return Grupo
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
