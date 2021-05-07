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
    public function getIdosoId(): int
    {
        return $this->idosoId;
    }

    /**
     * @param int $idosoId
     */
    public function setIdosoId(int $idosoId): void
    {
        $this->idosoId = $idosoId;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     */
    public function setDataNascimento(\DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getEndereco(): string
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    /**
     * @return \Usuario
     */
    public function getUsuarioIdusuario(): \Usuario
    {
        return $this->usuarioIdusuario;
    }

    /**
     * @param \Usuario $usuarioIdusuario
     */
    public function setUsuarioIdusuario(\Usuario $usuarioIdusuario): void
    {
        $this->usuarioIdusuario = $usuarioIdusuario;
    }

    /**
     * @return \Cuidador
     */
    public function getCuidadorCuidador(): \Cuidador
    {
        return $this->cuidadorCuidador;
    }

    /**
     * @param \Cuidador $cuidadorCuidador
     */
    public function setCuidadorCuidador(\Cuidador $cuidadorCuidador): void
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
            'idusuario' => $this->getUsuarioIdusuario(),
            'idcuidador' => $this->getCuidadorCuidador(),
        ];
    }
}
