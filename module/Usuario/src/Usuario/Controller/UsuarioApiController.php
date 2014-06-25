<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class UsuarioApiController extends \Application\Controller\ApiController
{

    public function get($id)
    {
        $model = $this->getServiceLocator()->get("Usuario\Model");
        $list = $model->buscarUsuario($id);

        if ($list instanceof \Usuario\Entity\Usuario) {
            $list = $list->toArray();
        }

        return new JsonModel($list);
    }

    public function getList()
    {
        $pagina = $this->params("pagina") || 0;
        $model = $this->getServiceLocator()->get("Usuario\Model");
        $list = $model->lista();

        $saidaJson = array();

        foreach ($list as $key => $value) {
            $saidaJson[] = $value->toArray();
        }

        return new JsonModel($saidaJson);
    }

    public function create($dados)
    {
        $model = $this->getServicelocator()->get("Usuario\Model");
        $return = array(
            'status' => false,
            'msg' => "Os dados enviados não são válidos.",
            'data' => array()
            );

        if (is_array($dados)) {
            // Grava usuário
            $result = $model->novoUsuario($dados);

            if (is_numeric($result)) {
                $return['status'] = true;
                $return['msg'] = "Usuário gravado com sucesso.";
                $return['data'] = $model->buscaUsuario($result);
            }
        }

        return new JsonModel($return);
    }

    public function update($id, $dados)
    {

    }

    public function delete($id)
    {

    }
}
