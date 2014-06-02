<?php

namespace Usuario\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class UsuarioRepository extends EntityRepository
{

    public function buscarUsuario(array $dados)
    {
        return $this->findOneBy($dados);
    }

    public function buscarUsuarios(array $dados)
    {
        return $this->findBy($dados);
    }
}
