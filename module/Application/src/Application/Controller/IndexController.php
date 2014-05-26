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
//     	$valid = new \Usuario\Form\Validate\Login();
    	if ($this->getRequest()->getPost()) {
    		$dados = $this->getRequest()->getPost();
    		
// 			//validando o formulário
			$authentication = new \Zend\Authentication\AuthenticationService();
			$adapter = new \Usuario\Model\Auth\Adapter($this->getDoctrine());
			$storage = new \Usuario\Model\Auth\Storage();
			
			$authentication->setAdapter($adapter);
			$authentication->setStorage($storage);
			
// 			$adapter->setCredential($credential);
// 			$adapter->setIdentity($identity);
			
// 			if($authentication->authenticate() != null) {
// 				// Aqui o usuário já estará logado
// 			} else {
// 				$this->flashmessenger()->addMensage("Este usuário não está habilitado para logar no sistema.");
// 			}
			
    	}
    		
        return new ViewModel(array(
        	$form
        ));
    }
}
