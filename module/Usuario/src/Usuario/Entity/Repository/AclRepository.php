<?php

namespace Usuario\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class AclRepository extends EntityRepository
{

    public function buscarPermissaoUsuario($where)
    {
        return $this->findBy($where);
    }
}
