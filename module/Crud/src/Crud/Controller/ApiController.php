<?php

namespace Crud\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ApiController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }


}

