<?php

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class MenuRepository extends EntityRepository
{

    public function buscarMenus($dados)
    {
        return $this->findBy($dados);
    }
}
