<?php

namespace Usuario\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuario\Form\UsuarioForm;
use Usuario\Validate\UsuarioValidate;

class IndexController extends AbstractActionController
{

    public function indexAction()
    {
        $string = "<a href='{{usuario}}' class='{{email}}'>{{nome}}</a>";

        preg_match_all("/{{[a-zA-Z]+}}/", $string, $saida, PREG_OFFSET_CAPTURE, 1);

        print_r($saida);

        return new ViewModel();
    }

    public function novoAction()
    {
        $form = new UsuarioForm();
        $request = $this->getRequest();

        // gravando
        if ($request->isPost()) {
            $data = $request->getPost();
            $validate = new UsuarioValidate();

            if ($validate->isValid()) {
                $usuario = $this->getServiceLocator()->get("Usuario\Model");
                $usuario->populate($data);

                $usuario->novoUsuario();
                $this->flashMessenger()->addMessage($usuario->getMensage());

                if ($usuario->isValid()) {
                    $this->redirect()->toRouter('usuario_lista');
                }
            }
        }

        return new ViewModel(
            array(
                'form' => $form
            )
        );
    }

    public function editarAction()
    {
        return new ViewModel();
    }

    public function excluirAction()
    {
        return new ViewModel();
    }

    public function statusAction()
    {
        return new ViewModel();
    }

    public function listaAction()
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
