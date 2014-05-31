<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    public function sairAction()
    {
        $authentication = $this->getServiceLocator()->get("Authentication\Usuario");
        $authentication->clearIdentity();

        $this->redirect()->toRoute("home");

        return $this->response;
    }
}
