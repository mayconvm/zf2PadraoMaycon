<?php

namespace Usuario\Model\Auth;

class Event
{
    
    private $event;
    private $serviceManager;
    private $acl;

    /**
     * @todo valida se o usuario tem permissao para acessar o controller, action, model
     * @return datatype description
    **/
    public function preDispach()
    {
    }

    /**
     * 
    **/
    public function setServiceManage($sm)
    {
        $this->serviceManager = $sm;
    }

    public function setMvcEvent($event)
    {
        $this->event = $event;
    }

    public function setAcl(\Usuario\Model\Auth\AclUsuario $acl)
    {
        $this->acl = $acl;
    }

    public function getServiceManager()
    {
        return $this->$serviceManager;
    }

    public function getMvcEvent()
    {
        return $this->$event;
    }

    public function getAcl()
    {
        return $this->acl;
    }
}
