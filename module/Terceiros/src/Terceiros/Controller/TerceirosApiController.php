<?php

namespace Terceiros\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;
use Application\Controller\ApiController;

// @todo deve exigir que o usuário esteja logad
class TerceirosApiController extends ApiController
{

    public function getModel()
    {
        return $this->getServiceLocator()->get("Model\ServicoTerceiros");
    }

    public function get($id)
    {
        $result = $this->getModel()->findTerceiros($id);

        return new JsonModel($result);
    }

    public function getList()
    {
        $result = $this->getModel()->listAll();

        return new JsonModel($result);
    }

    public function create($data)
    {
        $result = array(
                'status' => false,
                'menssage' => 'Os dados enviados não são validos.',
                'data' => ''
            );

        if (isset($data['dados']) and $data['dados'] != null) {
            $dataArray = \Zend\Json\Decoder::decode($data['dados'], \Zend\Json\Json::TYPE_ARRAY);

            // Adiciona idusuario
            $dataArray['idusuario'] = '1';
            $result = $this->getModel()->save($dataArray);
        }

        // return $this->response;

        return new JsonModel($result);
    }

    public function delete($id)
    {

    }

    public function update($id, $dados)
    {
        
    }
}
