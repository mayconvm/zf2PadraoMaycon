<?php

namespace Usuario\Model\Auth;

class Event
{
    
    private $event;
    private $serviceDoctrine;
    private $acl;

    /**
     * @todo valida se o usuario tem permissao para acessar o controller, action, model
     * @return datatype description
    **/
    public function preDispach()
    {
        $controller = $this->getMvcEvent();
        $action = $this->getMvcEvent();

        // valida se existe algum usuário logado
            // Caso usuário não tenha permissão deve verificar se o usuário
            // visitante pode visualizar a pagina atual
        // Valida se usuario tem permissão
    }

    /**
     * 
    **/
    public function setServiceDoctrine($sm)
    {
        $this->ServiceDoctrine = $sm;
    }

    public function setMvcEvent($event)
    {
        $this->event = $event;
    }

    public function setAcl(\Usuario\Model\Auth\AclUsuario $acl)
    {
        $this->acl = $acl;
    }

    public function getServiceDoctrine()
    {
        return $this->ServiceDoctrine;
    }

    public function getMvcEvent()
    {
        return $this->event;
    }

    public function getAcl()
    {
        return $this->acl;
    }
}
