<?php

namespace Usuario\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Usuario\Entity\Repository\UsuarioRepository")
 */
class Usuario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idusuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=true)
     */
    private $nome;

    /**
     * @var integer
     *
     * @ORM\Column(name="ativo", type="integer", nullable=true)
     */
    private $ativo;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipo", type="integer", nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=55, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=55, nullable=true)
     */
    private $senha;

    /**
     * @var \Grupo\Entity\Grupo
     *
     * @ORM\ManyToOne(targetEntity="Grupo\Entity\Grupo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idgrupo", referencedColumnName="idgrupo")
     * })
     */
    private $idgrupo;



    /**
     * Get idusuario
     *
     * @return integer 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return Usuario
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set ativo
     *
     * @param integer $ativo
     * @return Usuario
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set tipo
     *
     * @param integer $tipo
     * @return Usuario
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return integer 
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuario
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set senha
     *
     * @param string $senha
     * @return Usuario
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get senha
     *
     * @return string 
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set idgrupo
     *
     * @param \Usuario\Entity\Grupo $idgrupo
     * @return Usuario
     */
    public function setIdgrupo(\Usuario\Entity\Grupo $idgrupo = null)
    {
        $this->idgrupo = $idgrupo;

        return $this;
    }

    /**
     * Get idgrupo
     *
     * @return \Usuario\Entity\Grupo 
     */
    public function getIdgrupo()
    {
        return $this->idgrupo;
    }
}
