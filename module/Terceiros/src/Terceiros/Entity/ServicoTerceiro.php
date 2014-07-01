<?php

namespace Terceiros\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ServicoTerceiro
 *
 * @ORM\Table(name="servico_terceiro")
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Terceiros\Entity\Repository\ServicoTerceiroRepository")
 */
class ServicoTerceiro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idservico_terceiro", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idservicoTerceiro;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=45, nullable=true)
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=45, nullable=true)
     */
    private $ip;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     * @var string
     *
     * @ORM\Column(name="email_contato", type="string", length=45, nullable=true)
     */
    private $emailContato;

    /**
     * @var \Usuario\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario")
     * })
     */
    private $idusuario;



    /**
     * Get idservicoTerceiro
     *
     * @return integer 
     */
    public function getIdservicoTerceiro()
    {
        return $this->idservicoTerceiro;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return ServicoTerceiro
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return ServicoTerceiro
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @return ServicoTerceiro
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime 
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set emailContato
     *
     * @param string $emailContato
     * @return ServicoTerceiro
     */
    public function setEmailContato($emailContato)
    {
        $this->emailContato = $emailContato;

        return $this;
    }

    /**
     * Get emailContato
     *
     * @return string 
     */
    public function getEmailContato()
    {
        return $this->emailContato;
    }

    /**
     * Set idusuario
     *
     * @param \Usuario\Entity\Usuario $idusuario
     * @return ServicoTerceiro
     */
    public function setIdusuario(\Usuario\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \Usuario\Entity\Usuario 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * Saida das colunas em array
     * @return array Dados da entitade
    */
    public function toArray()
    {
        $hydrator = new \Zend\Stdlib\Hydrator\ClassMethods(false);
        return $hydrator->extract($this);
    }

    /**
     * Popula a entidade
     * @return void
    */
    public function populate(array $list)
    {
        foreach ($list as $method => $item) {
            $setMethod = "set" . ucfirst($method);
            if (method_exists($this, $setMethod)) {
                $this->{$setMethod}($item);
            }
        }
    }
}
