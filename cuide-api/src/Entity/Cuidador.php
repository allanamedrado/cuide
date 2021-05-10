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
     * @return \Usuario
     */
    public function getUsuarioIdusuario()
    {
        return $this->usuarioIdusuario;
    }

    /**
     * @param \Usuario $usuarioIdusuario
     */
    public function setUsuarioIdusuario(Usuario $usuarioIdusuario)
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
            'idusuario' => $this->getUsuarioIdusuario()->getIdusuario()

        ];
    }


}
