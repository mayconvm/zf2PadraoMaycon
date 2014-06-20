<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MenuController extends AbstractActionController
{

    public function indexAction()
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
