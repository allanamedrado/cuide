<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idoso
 *
 * @ORM\Table(name="idoso", indexes={@ORM\Index(name="fk_idoso_cuidador1_idx", columns={"cuidador_cuidador_id"}), @ORM\Index(name="fk_idoso_Usuario1_idx", columns={"Usuario_idUsuario"})})
 * @ORM\Entity
 */
class Idoso
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idosoId;

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
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date", nullable=false)
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=45, nullable=false)
     */
    private $endereco;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Usuario_idUsuario", referencedColumnName="idUsuario")
     * })
     */
    private $usuarioIdusuario;

    /**
     * @var \Cuidador
     *
     * @ORM\ManyToOne(targetEntity="Cuidador")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cuidador_cuidador_id", referencedColumnName="cuidador_id")
     * })
     */
    private $cuidadorCuidador;

    /**
     * @return int
     */
    public function getIdosoId()
    {
        return $this->idosoId;
    }

    /**
     * @param int $idosoId
     */
    public function setIdosoId(int $idosoId)
    {
        $this->idosoId = $idosoId;
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
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     */
    public function setDataNascimento(\DateTime $dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return \Usuario
     */
    public function getUsuarioIdusuario()
    {
        return $this->usuarioIdusuario;
    }

    /**
     * @param Usuario $usuarioIdusuario
     */
    public function setUsuarioIdusuario(Usuario $usuarioIdusuario)
    {
        $this->usuarioIdusuario = $usuarioIdusuario;
    }

    /**
     * @return \Cuidador
     */
    public function getCuidadorCuidador()
    {
        return $this->cuidadorCuidador;
    }

    /**
     * @param \Cuidador $cuidadorCuidador
     */
    public function setCuidadorCuidador(Cuidador $cuidadorCuidador)
    {
        $this->cuidadorCuidador = $cuidadorCuidador;
    }

    public function toArray()
    {
        return [
            'ididoso' => $this->getIdosoId(),
            'nome' => $this->getNome(),
            'cpf' => $this->getCpf(),
            'email' => $this->getEmail(),
            'data_nascimento' => $this->getDataNascimento(),
            'endereco' => $this->getEndereco(),
            'idusuario' => $this->getUsuarioIdusuario()->getIdusuario(),
            'idcuidador' => $this->getCuidadorCuidador(),
        ];
    }
}
