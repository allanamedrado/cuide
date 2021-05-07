<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exame
 *
 * @ORM\Table(name="exame", indexes={@ORM\Index(name="fk_exame_usuario1_idx", columns={"usuario_idUsuario"}), @ORM\Index(name="fk_exame_idoso1_idx", columns={"idoso_idoso_id"})})
 * @ORM\Entity
 */
class Exame
{
    /**
     * @var int
     *
     * @ORM\Column(name="exame_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $exameId;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="data", type="string", length=45, nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="string", length=45, nullable=false)
     */
    private $local;

    /**
     * @var \Idoso
     *
     * @ORM\ManyToOne(targetEntity="Idoso")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idoso_idoso_id", referencedColumnName="idoso_id")
     * })
     */
    private $idosoIdoso;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario_idUsuario", referencedColumnName="idUsuario")
     * })
     */
    private $usuarioIdusuario;

    /**
     * @return int
     */
    public function getExameId(): int
    {
        return $this->exameId;
    }

    /**
     * @param int $exameId
     */
    public function setExameId(int $exameId): void
    {
        $this->exameId = $exameId;
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
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getLocal(): string
    {
        return $this->local;
    }

    /**
     * @param string $local
     */
    public function setLocal(string $local): void
    {
        $this->local = $local;
    }

    /**
     * @return \Idoso
     */
    public function getIdosoIdoso(): \Idoso
    {
        return $this->idosoIdoso;
    }

    /**
     * @param \Idoso $idosoIdoso
     */
    public function setIdosoIdoso(\Idoso $idosoIdoso): void
    {
        $this->idosoIdoso = $idosoIdoso;
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
            'idexame' => $this->getExameId(),
            'nome' => $this->getNome(),
            'data' => $this->getData(),
            'local' => $this->getLocal(),
            'ididoso' => $this->getIdosoIdoso(),
            'idusuario' => $this->getUsuarioIdusuario(),
        ];
    }
}
