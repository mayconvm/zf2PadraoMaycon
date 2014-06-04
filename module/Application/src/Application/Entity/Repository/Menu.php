<?php

namespace Application\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class Menu extends EntityRepository
{

    public function buscarMenus($dados)
    {
        return $this->findBy($dados);
    }
}
