<?php

namespace Application\View;

use Zend\Filter\Word\UnderscoreToCamelCase;
use Zend\View\Helper\AbstractHelper;

class Menu extends AbstractHelper
{
    private $acl;
    private $doctrine;
    private $tpl = array(
                'openList' => '<lu class="nav nav-sidebar">',
                'openItem' => '<li><a href="{{itemLink}}" titile="Acessar {{itemText}}">{{itemText}}',
                'itemActive' => '<li class="active"><a href="{{itemLink}}" titile="Acessar {{itemText}}">{{itemText}}',
                'closeItem' => '</a></li>',
                'closeList' => '</ul>'
            );
    public static $entityName = "Application\Entity\Menu";

    public function setAcl(\Usuario\Model\Auth\AclUsuario $acl)
    {
        $this->acl = $acl;
    }

    public function setDoctrine(\Doctrine\ORM\EntityManager $entity)
    {
        $this->doctrine = $entity;
    }

    public function getDoctrine()
    {
        return $this->doctrine;
    }

    public function getAcl()
    {
        return $this->acl;
    }

    public function setTemplate(array $tpl)
    {
        $this->tpl = array_merge($this->tpl, $tpl);
    }

    public function dispach()
    {
        // Busca menus
        $acl = $this->getAcl();
        if (empty($acl)) {
            return;
        }

        // Filtros para menu
        $listPrivilege = array();
        foreach ($acl->getPrivilege() as $key => $item) {
            $listPrivilege[] = $item->getIdaclPrivilege();
        }

        // renderiza o layout
        $saida = $this->tpl['openList'];

        $repositoryMenu = $this->getDoctrine()->getRepository(self::$entityName);

        $listMenu = $repositoryMenu->buscarMenus(
            array(
                'idprivilege' => $listPrivilege
            )
        );

        foreach ($listMenu as $key => $entity) {
            $saida .= $this->_render($entity);
        }

        $saida .= $this->tpl['closeList'];
        return $saida;
    }

    private function _render(\Application\Entity\Menu $item)
    {
        $htmlReturn = $this->tpl['openItem'];
        $text = "/{{itemText}}/";
        $link = "/{{itemLink}}/";

        $replaceText = $item->getMenu();
        $replaceLink = $this->_url(
            array(
                    'route'  => $item->getLink(),
                    'option' => $item->getOptions()
            )
        );

        $htmlReturn = preg_replace($text, $replaceText, $htmlReturn);
        $htmlReturn = preg_replace($link, $replaceLink, $htmlReturn);

        return $htmlReturn . $this->tpl['closeItem'];
    }

    private function _url(array $dados)
    {
        $link = $dados['route'];
        $option = $dados['option']? json_decode($dados['option'], true) : array();
        $helper = $this->getView();

        if (empty($link)) {
            return '#';
        }

        return $helper->url($link, $option);
    }
}
