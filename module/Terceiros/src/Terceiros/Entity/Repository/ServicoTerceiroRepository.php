<?php

namespace Terceiros\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class ServicoTerceiroRepository extends EntityRepository
{

    public function findAllList($where = array(), $order = array(), $limit = null)
    {
        return $this->findBy(
            $where,
            $order,
            $limit
        );
    }
}
