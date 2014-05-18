<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class BaseController extends AbstractActionController
{
	/**
	 * Retorna a instancia do doctrine
	 */
	public function getDoctrine() {
		return $this->getServiceLocator()->get("Doctriner\Orm\EntityManager");
	}

}
