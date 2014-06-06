<?php

namespace Usuario\Model\Auth\Storage;

use Zend\Session\AbstractContainer;
use Usuario\Model\Auth\Session\ManagerSession;

class Container extends AbstractContainer {
	
	public function __construct() {
		$manager = new ManagerSession();
		
		parent::__construct("controller_user", $manager);
	}
}