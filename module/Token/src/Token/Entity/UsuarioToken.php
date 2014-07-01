<?php

namespace Token\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioToken
 *
 * @ORM\Table(name="usuario_token")
 * @ORM\Entity
 */
class UsuarioToken
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idusuario_token", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuarioToken;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtoken", type="integer", nullable=true)
     */
    private $idtoken;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_validade", type="datetime", nullable=true)
     */
    private $dataValidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_cadastro", type="datetime", nullable=true)
     */
    private $dataCadastro;

    /**
     * @var \Token\Entity\ServicoTerceiro
     *
     * @ORM\ManyToOne(targetEntity="Token\Entity\ServicoTerceiro")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idservico_terceiro", referencedColumnName="idservico_terceiro")
     * })
     */
    private $idservicoTerceiro;

    /**
     * @var \Token\Entity\Usuario
     *
     * @ORM\ManyToOne(targetEntity="Token\Entity\Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario")
     * })
     */
    private $idusuario;



    /**
     * Get idusuarioToken
     *
     * @return integer 
     */
    public function getIdusuarioToken()
    {
        return $this->idusuarioToken;
    }

    /**
     * Set idtoken
     *
     * @param integer $idtoken
     * @return UsuarioToken
     */
    public function setIdtoken($idtoken)
    {
        $this->idtoken = $idtoken;

        return $this;
    }

    /**
     * Get idtoken
     *
     * @return integer 
     */
    public function getIdtoken()
    {
        return $this->idtoken;
    }

    /**
     * Set dataValidade
     *
     * @param \DateTime $dataValidade
     * @return UsuarioToken
     */
    public function setDataValidade($dataValidade)
    {
        $this->dataValidade = $dataValidade;

        return $this;
    }

    /**
     * Get dataValidade
     *
     * @return \DateTime 
     */
    public function getDataValidade()
    {
        return $this->dataValidade;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     * @return UsuarioToken
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
     * Set idservicoTerceiro
     *
     * @param \Token\Entity\ServicoTerceiro $idservicoTerceiro
     * @return UsuarioToken
     */
    public function setIdservicoTerceiro(\Token\Entity\ServicoTerceiro $idservicoTerceiro = null)
    {
        $this->idservicoTerceiro = $idservicoTerceiro;

        return $this;
    }

    /**
     * Get idservicoTerceiro
     *
     * @return \Token\Entity\ServicoTerceiro 
     */
    public function getIdservicoTerceiro()
    {
        return $this->idservicoTerceiro;
    }

    /**
     * Set idusuario
     *
     * @param \Token\Entity\Usuario $idusuario
     * @return UsuarioToken
     */
    public function setIdusuario(\Token\Entity\Usuario $idusuario = null)
    {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return \Token\Entity\Usuario 
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
}
