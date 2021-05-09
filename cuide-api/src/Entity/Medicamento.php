<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicamento
 *
 * @ORM\Table(name="medicamento", indexes={@ORM\Index(name="fk_medicamento_usuario1_idx", columns={"usuario_idUsuario"}), @ORM\Index(name="fk_medicamento_idoso1_idx", columns={"idoso_idoso_id"})})
 * @ORM\Entity
 */
class Medicamento
{
    /**
     * @var int
     *
     * @ORM\Column(name="medicamento_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $medicamentoId;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=45, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="quantidade", type="string", length=45, nullable=false)
     */
    private $quantidade;

    /**
     * @var string
     *
     * @ORM\Column(name="dosagem", type="string", length=45, nullable=false)
     */
    private $dosagem;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inicio", type="date", nullable=false)
     */
    private $dataInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_fim", type="date", nullable=false)
     */
    private $dataFim;

    /**
     * @var string
     *
     * @ORM\Column(name="horario", type="string", length=45, nullable=false)
     */
    private $horario;

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
    public function getMedicamentoId(): int
    {
        return $this->medicamentoId;
    }

    /**
     * @param int $medicamentoId
     */
    public function setMedicamentoId(int $medicamentoId): void
    {
        $this->medicamentoId = $medicamentoId;
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
    public function getQuantidade(): string
    {
        return $this->quantidade;
    }

    /**
     * @param string $quantidade
     */
    public function setQuantidade(string $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return string
     */
    public function getDosagem(): string
    {
        return $this->dosagem;
    }

    /**
     * @param string $dosagem
     */
    public function setDosagem(string $dosagem): void
    {
        $this->dosagem = $dosagem;
    }

    /**
     * @return \DateTime
     */
    public function getDataInicio(): \DateTime
    {
        return $this->dataInicio;
    }

    /**
     * @param \DateTime $dataInicio
     */
    public function setDataInicio(\DateTime $dataInicio): void
    {
        $this->dataInicio = $dataInicio;
    }

    /**
     * @return \DateTime
     */
    public function getDataFim(): \DateTime
    {
        return $this->dataFim;
    }

    /**
     * @param \DateTime $dataFim
     */
    public function setDataFim(\DateTime $dataFim): void
    {
        $this->dataFim = $dataFim;
    }

    /**
     * @return string
     */
    public function getHorario(): string
    {
        return $this->horario;
    }

    /**
     * @param string $horario
     */
    public function setHorario(string $horario): void
    {
        $this->horario = $horario;
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
            'idmedicamento' => $this->getMedicamentoId(),
            'nome' => $this->getNome(),
            'quantidade' => $this->getQuantidade(),
            'dosagem' => $this->getDosagem(),
            'data_inicio' => $this->getDataInicio(),
            'data_fim' => $this->getDataFim(),
            'horario' => $this->getHorario(),
            'ididoso' => $this->getIdosoIdoso(),
            'idusuario' => $this->getUsuarioIdusuario(),
        ];
    }

}
