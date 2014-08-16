<?php

namespace Usuario\Model\Auth;

use Zend\Authentication\Storage\Session;
use Zend\Session\SessionManager;

class Storage extends Session
{
    public function __construct()
    {
        parent::__construct('controller_user', null, new SessionManager());
    }
}
