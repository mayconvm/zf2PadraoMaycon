<?php

namespace Usuario\Model\Auth; 

use Zend\Authentication\Storage\Session;

class Storage extends Session{
	
	public function __construct() {
		$manager = new \Zend\Session\SessionManager();
		
		parent::__construct(null, null, $manager);
	}
}
