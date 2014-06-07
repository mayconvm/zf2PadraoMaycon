<?php

namespace ACL\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ApiPrevilegeController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

