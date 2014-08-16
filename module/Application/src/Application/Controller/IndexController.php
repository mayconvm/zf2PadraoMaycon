<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends BaseController
{
    
    /**
     * Action para executar o login
     * TODO deve ser o controller efetuar o login
     * @see \Zend\Mvc\Controller\AbstractActionController::indexAction()
     */
    public function indexAction()
    {
        $form = new \Usuario\Form\Login();
        
        $authentication = $this->getServiceLocator()->get('Authentication\Usuario');
        $request = $this->getRequest();

        if ($request->isPost()) {

            $formValidator = new \Usuario\Form\Validator\LoginValidator();
            {
                $form->setInputFilter($formValidator->getInputFilter());
                $form->setData($request->getPost());
            }

            // Captura dados de login
            $dados = $request->getPost();
            $credential = $dados['login'];
            $identity = $dados['senha'];

            
            //validando o formulário

            //Realiza a autenticação
            $authentication->getAdapter()->setCredential($credential);
            $authentication->getAdapter()->setIdentity($identity);
        }

        if ($authentication->authenticate()->isValid()) {
            $this->redirect()->toRoute('usuario_index');
        } else {
            print_r($this->authentication()->getMenssages());
            $this->flashmessenger()->addMessage("Este usuário não está habilitado para logar no sistema.");
        }

        $view = new ViewModel(
            array(
                'form' => $form
                )
        );

        $view->setTerminal(true);

        return $view;
    }
}
