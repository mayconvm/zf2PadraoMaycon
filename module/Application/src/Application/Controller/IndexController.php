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
        //$valid = new \Usuario\Form\Validate\Login();
        $authentication = $this->getServiceLocator()->get('Authentication\Usuario');

        if ($this->getRequest()->isPost()) {
            // Captura dados de login
            $dados = $this->getRequest()->getPost();
            $credential = $dados['login'];
            $identity = $dados['senha'];
            
            //validando o formulário

            //Realiza a autenticação
            $authentication->getAdapter()->setCredential($credential);
            $authentication->getAdapter()->setIdentity($identity);
            $authentication->authenticate();

        }

        if ($authentication->hasIdentity()) {
            $this->redirect()->toRoute('usuario_index');
        } else {
            $this->flashmessenger()->addMessage("Este usuário não está habilitado para logar no sistema.");
        }
            
        return new ViewModel(array(
            $form
        ));
    }
}
