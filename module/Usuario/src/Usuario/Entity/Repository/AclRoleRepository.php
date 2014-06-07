<?php

namespace Usuario\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class AclRoleRepository extends EntityRepository
{

    public function buscarRole($where)
    {
        return $this->findOneBy($where);
    }
}
