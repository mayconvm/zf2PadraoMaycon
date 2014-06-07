<?php

namespace ACL\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ApiRoleController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

