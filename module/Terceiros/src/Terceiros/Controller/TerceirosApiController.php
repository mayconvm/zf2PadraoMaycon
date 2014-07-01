<?php

namespace Terceiros\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Application\Controller\ApiController;

// @todo deve exigir que o usuário esteja logad
class TerceirosApiController extends ApiController
{

    public function get($id)
    {
        
        return new JsonModel();
    }

    public function getList()
    {
        $model = $this->getServiceLocator()->get("Model\ServicoTerceiros");
        $result = $model->listAll();

        return new JsonModel($result);
    }

    public function create($data)
    {
        if ($data != null) {
            $model = $this->getServiceLocator()->get("Model\ServicoTerceiros");

            $result = $model->save($data);
        }

        return new JsonModel($result);
    }

    public function delete($id)
    {

    }

    public function update($id, $dados)
    {
        
    }
}
