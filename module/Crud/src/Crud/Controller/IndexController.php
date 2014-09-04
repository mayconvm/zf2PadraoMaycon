<?php

namespace Crud\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        return new ViewModel();
    }

    /**
     * @todo deve gerar as principais actions do controller (novo, editar, excluir, status) 
     * nas actions deve ser adicionado ja o formulário e a validação de formulário
     * tambem deve gerar entidate do banco de dado informado que o o formulário vai preencher
    **/
    public function controllerAction()
    {
        if ($this->getRespose()->isPost()) {
            $data = $this->getRespose()->getPost();
            exec("/.vendor/bin/zf.php create module ". $data['nomeModulo']);

            $msg = "Modulo gerado com sucesso!";

            if (!is_dir("module/".$data['nomeModulo'])) {
                $msg = "Ops! aconteceu um erro";
            }
        }

        return new ViewModel(
            array(
                'mensagemForm' => $msg
            )
        );
    }

    /**
    * @todo gerar todas as pastas (Controller, Form, Validate, Entity, Entity\Repository)
    **/
    public function moduleAction()
    {
        $msg = "";

        if ($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            $msg = shell_exec(getcwd() . "/vendor/bin/zf.php create module ". $data['nomeModulo']);

            // $msg .= "<br>Modulo gerado com sucesso!";
            // echo $this->layout()->baseUrl();

            echo getcwd();
            var_dump(is_dir("./module/".$data['nomeModulo']));
            var_dump($msg);
            die;

            if (!is_dir("module/".$data['nomeModulo'])) {
                $msg = "Ops! aconteceu um erro";
            }
        }

        return new ViewModel(
            array(
                'mensagemForm' => $msg
            )
        );
    }
}
