<?php

namespace Usuario\Model\Auth;

use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;

class Adapter extends AbstractAdapter implements AdapterInterface{
	
	private $drive;
	private $isValid = \Zend\Authentication\Result::FAILURE;

	public function __construct($doctrine) {
		$this->drive = $doctrine;
	}
	
	public function authenticate() {
		
		$entity = $this->drive->findOneBy('Usuario\Entity\Usuario',array(
			'usuario' => $this->getCredential(),
			'senha' => sha1($this->getIdentity()),
			//'ativo' => 1
		));
		
		if ($entity != null) {
			$this->isValid = \Zend\Authentication\Result::SUCCESS;
			if ($entity->ativo) {
				$this->isValid = \Zend\Authentication\Result::FAILURE_CREDENTIAL_INVALID;
			}
			return $entity;
		}
		
		return null;		
	}
	
	public function isValid() {
		return $this->isValid;
	}
}
