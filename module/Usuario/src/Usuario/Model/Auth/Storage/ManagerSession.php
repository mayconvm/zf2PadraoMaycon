<?php

namespace Usuario\Model\Auth\Storage;

use Zend\Session\AbstractManager;

class ManagerSession extends AbstractManager {
	
	public function __construct() {
		//TODO deve ser adicionado as configurações da sessão
		parent::__construct(array(
			
		));
	}
}
