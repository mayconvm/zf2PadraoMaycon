<?php

namespace ACL\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ApiResourceController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

