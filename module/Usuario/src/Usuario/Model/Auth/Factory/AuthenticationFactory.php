<?php

namespace Usuario\Model\Auth\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authetication\AutheticationService;
use Usuario\Model\Auth\Storage as StorageUser;
use Usuario\Model\Auth\Adapter;

class AutheticationFactory extends FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityManager = $serviceLocator->get("Doctrine\ORM\EntityManger");

        return new AutheticationService(new StorageUser(), new Adapter($entityManager));
    }
}
