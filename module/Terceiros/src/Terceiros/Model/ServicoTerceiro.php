<?php

namespace Terceiros\Model;

class ServicoTerceiro
{

    private $doctrine;

    public function __construct(\Doctrine\ORM\EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function save($data)
    {
        $entity = $this->doctrine->getRepository("Terceiros\Entity\ServicoTerceiro");

        $columns = $entity->toArray();
        $filter = new \Terceiros\Filter\ServicoTerceiros(array_keys($columns));

        if ($filter != null) {
            return json_encode(
                array(
                    'status' => false,
                    'error' => $filter
                    )
            );
        }

        $entity->populate($data);
        $this->doctrine->persist($entity);
        $this->doctrine->flush();


        return array(
                    'status' => true,
                    'data' => $Entity->toArray()
                );
    }

    public function listAll()
    {
        $repository = $this->doctrine->getRepository("Terceiros\Entity\ServicoTerceiro");
        $list = $repository->findAllList();

        return $list;
    }
}
