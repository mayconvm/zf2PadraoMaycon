<?php

namespace Usuario\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class AclPrivilegeRepository extends EntityRepository
{

    public function buscarPermissao($where)
    {
        return $this->findBy($where);
    }
}
