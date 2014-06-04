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
        $rota = $this->getMvcEvent()->getRouteMatch();
        $usuario = $this->getAcl()->getUsuario();
        $controller = $rota->getParam('controller');
        $action = $rota->getParam('action');

        if ($usuario instanceof \Usuario\Entity\Usuario) {
            // if (!$this->getAcl()->isAllowed($usuario->getIdUsuario(), $controller, $action)) {
            //     $this->redirect('/');
            // }
        }



        // valida se existe algum usuário logado
            // Caso usuário não tenha permissão deve verificar se o usuário
            // visitante pode visualizar a pagina atual
        // Valida se usuario tem permissão
    }

    private function redirect($url)
    {
        $header = $this->getMvcEvent()->getHeaders();
        $header->addHeaderLine("locate", $url);
    }

    /**
     * 
    **/
    public function setServiceDoctrine(\Doctrine\ORM\EntityManager $sm)
    {
        $this->ServiceDoctrine = $sm;
    }

    public function setMvcEvent(\Zend\Mvc\MvcEvent $event)
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
