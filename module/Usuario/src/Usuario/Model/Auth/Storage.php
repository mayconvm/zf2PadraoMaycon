<?php

namespace Usuario\Model\Auth; 

use Zend\Authentication\Storage\Session;

class Session implements StorageInterface{
	
	public function __construct() {
		$manager = new \Usuario\Model\Auth\Session\ManagerSession();
		
		parent::__construct(null, null, $manager);
	}
}
