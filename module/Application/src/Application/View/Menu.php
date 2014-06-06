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
                'openItem' => '<li><a href="{{ItemLink}}" titile="{{Itemtext}}">{{Itemtext}}',
                'itemActive' => '<li class="active"><a href="{{ItemLink}}" titile="{{Itemtext}}">{{Itemtext}}',
                'closeItem' => '</a></li>',
                'closeList' => '</ul>'
            );

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
        $this->acl;
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
        foreach ($acl->getIdPrivilege() as $key => $acl) {
            $listPrivilege[] = $acl->getIdPrivilege();
        }

        // renderiza o layout
        $saida = $this->tpl['openList'];

        $repository = $this->getDoctrine()->buscarMenus(
            array(
                'idprivilege' => $listPrivilege
            )
        );

        foreach ($repository as $key => $entity) {
            $saida .= $this->_render($entity);
        }

        $saida .= $this->tpl['closeList'];
        return $saida;
    }

    private function _render(\Application\Entity\Menu $item)
    {
        $htmlReturn = $this->tpl['openList'];
        preg_match_all("/{{[a-zA-Z]+}}/", $htmlReturn, $listaAlias);

        if (!empty($listaAlias)) {
            $filterCamelCase = new UnderscoreToCamelCase();

            foreach ($listaAlias[0] as $key => $alias) {
                $method = $filterCamelCase->filter("get".$alias);
                if (method_exists($item, $method)) {
                    $htmlReturn = str_replace($alias, $this->{$method}(), $htmlReturn);
                }
            }
        }

        return $htmlReturn;
    }
}
