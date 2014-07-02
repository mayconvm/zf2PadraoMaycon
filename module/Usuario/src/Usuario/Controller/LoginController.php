<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController
{

    /**
     * @todo login para pedido de token
     * @todo deve abrir a tela em popup ou tela comum o padrão deve ser tela comum
    */
    public function indexAction()
    {
        // @todo j
        return new ViewModel();
    }

    public function logoutAction()
    {
        return new ViewModel();
    }

    public function novoAction()
    {
        return new ViewModel();
    }

    public function editarAction()
    {
        return new ViewModel();
    }

    public function suspenderAction()
    {
        return new ViewModel();
    }

    public function excluirAction()
    {
        return new ViewModel();
    }
}
