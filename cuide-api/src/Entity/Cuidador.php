<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cuidador
 *
 * @ORM\Table(name="cuidador", indexes={@ORM\Index(name="fk_cuidador_Usuario1_idx", columns={"Usuario_idUsuario"})})
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
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Usuario_idUsuario", referencedColumnName="idUsuario")
     * })
     */
    private $usuarioIdusuario;

    /**
     * @return int
     */
    public function getCuidadorId(): int
    {
        return $this->cuidadorId;
    }

    /**
     * @param int $cuidadorId
     */
    public function setCuidadorId(int $cuidadorId): void
    {
        $this->cuidadorId = $cuidadorId;
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
     * @return string
     */
    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    /**
     * @param string $dataNascimento
     */
    public function setDataNascimento(string $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getCertificacao(): string
    {
        return $this->certificacao;
    }

    /**
     * @param string $certificacao
     */
    public function setCertificacao(string $certificacao): void
    {
        $this->certificacao = $certificacao;
    }

    /**
     * @return string
     */
    public function getFoto(): string
    {
        return $this->foto;
    }

    /**
     * @param string $foto
     */
    public function setFoto(string $foto): void
    {
        $this->foto = $foto;
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

    public function toArray()
    {
        return [
            'idcuidador' => $this->getCuidadorId(),
            'nome' => $this->getNome(),
            'cpf' => $this->getCpf(),
            'email' => $this->getEmail(),
            'data_nascimento' => $this->getDataNascimento(),
            'certificacao' => $this->getCertificacao(),
            'foto' => $this->getFoto(),
            'idusuario' => $this->getUsuarioIdusuario(),

        ];
    }


}
