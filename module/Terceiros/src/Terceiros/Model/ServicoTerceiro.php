<?php

namespace Terceiros\Model;

use Terceiros\Entity\ServicoTerceiro as EntityServicoTerceiro;
use Terceiros\Filter\ServicoTerceiro as FilterServicoTerceiros;

class ServicoTerceiro
{

    private $doctrine;

    protected static $entityUsuario = "Usuario\Entity\Usuario";

    public function __construct(\Doctrine\ORM\EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function save(array $data)
    {
        $entity = new EntityServicoTerceiro();
        $repository = $this->doctrine->getRepository("Terceiros\Entity\ServicoTerceiro");

        $columns = $entity->toArray();
        $classFilter = new FilterServicoTerceiros($columns);
        $filter = $classFilter->filter($data);

        if ($filter != null) {
            return array(
                    'status' => false,
                    'error' => $filter
                );
        }

        // IdUsuario
        $repositoryUsuario = $this->doctrine->getRepository(self::$entityUsuario);
        $data['idusuario'] = $repositoryUsuario->buscarId($data['idusuario']);

        $entity->populate($data);
        $this->doctrine->persist($entity);
        $this->doctrine->flush();


        return array(
                    'status' => true,
                    'data' => $entity->toArray()
                );
    }

    public function listAll($where = array(), $order = array(), $limit = null)
    {
        $repository = $this->doctrine->getRepository("Terceiros\Entity\ServicoTerceiro");
        $list = $repository->findAllList($where, $order, $limit);

        return $list;
    }

    public function findTerceiros($idTerceiros)
    {
        $repository = $this->doctrine->getRepository("Terceiros\Entity\ServicoTerceiro");
        $list = $repository->findOne($idTerceiros);

        return $list;
    }
}
