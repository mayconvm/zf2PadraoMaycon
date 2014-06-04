<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\MenuRepository")
 */
class Menu
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmenu", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="menu", type="string", length=45, nullable=true)
     */
    private $menu;

    /**
     * @var string
     *
     * @ORM\Column(name="alias", type="string", length=45, nullable=true)
     */
    private $alias;

    /**
     * @var integer
     *
     * @ORM\Column(name="idprivilege", type="integer", nullable=false)
     */
    private $idprivilege;

    /**
     * @var integer
     *
     * @ORM\Column(name="idsubmenu", type="integer", nullable=false)
     */
    private $idsubmenu;



    /**
     * Get idmenu
     *
     * @return integer 
     */
    public function getIdmenu()
    {
        return $this->idmenu;
    }

    /**
     * Set menu
     *
     * @param string $menu
     * @return Menu
     */
    public function setMenu($menu)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return string 
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set alias
     *
     * @param string $alias
     * @return Menu
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
     * Set idprivilege
     *
     * @param integer $idprivilege
     * @return Menu
     */
    public function setIdprivilege($idprivilege)
    {
        $this->idprivilege = $idprivilege;

        return $this;
    }

    /**
     * Get idprivilege
     *
     * @return integer 
     */
    public function getIdprivilege()
    {
        return $this->idprivilege;
    }

    /**
     * Set idsubmenu
     *
     * @param integer $idsubmenu
     * @return Menu
     */
    public function setIdsubmenu($idsubmenu)
    {
        $this->idsubmenu = $idsubmenu;

        return $this;
    }

    /**
     * Get idsubmenu
     *
     * @return integer 
     */
    public function getIdsubmenu()
    {
        return $this->idsubmenu;
    }
}
