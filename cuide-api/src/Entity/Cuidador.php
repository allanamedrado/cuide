<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuidador
 *
 * @ORM\Table(name="cuidador")
 * @ORM\Entity
 */
class Cuidador
{
    /**
     * @var int
     *
     * @ORM\Column(name="cuidador_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $cuidadorId;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=45, nullable=false)
     */
    private $cpf;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=45, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="data_nascimento", type="string", length=45, nullable=false)
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="certificacao", type="string", length=45, nullable=false)
     */
    private $certificacao;

    /**
     * @var string
     *
     * @ORM\Column(name="foto", type="string", length=45, nullable=false)
     */
    private $foto;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Idoso", mappedBy="cuidadorCuidador")
     */
    private $idosoIdoso;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idosoIdoso = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return int
     */
    public function getCuidadorId()
    {
        return $this->cuidadorId;
    }

    /**
     * @param int $cuidadorId
     */
    public function setCuidadorId(int $cuidadorId)
    {
        $this->cuidadorId = $cuidadorId;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param string $dataNascimento
     */
    public function setDataNascimento(string $dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getCertificacao()
    {
        return $this->certificacao;
    }

    /**
     * @param string $certificacao
     */
    public function setCertificacao(string $certificacao)
    {
        $this->certificacao = $certificacao;
    }

    /**
     * @return string
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto(string $foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdosoIdoso()
    {
        return $this->idosoIdoso;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $idosoIdoso
     */
    public function setIdosoIdoso($idosoIdoso): void
    {
        $this->idosoIdoso = $idosoIdoso;
    }


}
