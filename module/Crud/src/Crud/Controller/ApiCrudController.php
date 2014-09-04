<?php

namespace Crud\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class ApiCrudController extends AbstractRestfulController
{

    public function get()
    {
        return new JsonModel();
    }

    public function getList()
    {
        return new JsonModel();
    }

    public function create()
    {
        return new JsonModel();
    }

    public function update()
    {
        return new JsonModel();
    }

    public function delete()
    {
        return new JsonModel();
    }


}

