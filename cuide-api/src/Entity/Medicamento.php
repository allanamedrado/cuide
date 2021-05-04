<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medicamento
 *
 * @ORM\Table(name="medicamento")
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
     * @return int
     */
    public function getMedicamentoId()
    {
        return $this->medicamentoId;
    }

    /**
     * @param int $medicamentoId
     */
    public function setMedicamentoId(int $medicamentoId)
    {
        $this->medicamentoId = $medicamentoId;
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
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * @param string $quantidade
     */
    public function setQuantidade(string $quantidade)
    {
        $this->quantidade = $quantidade;
    }

    /**
     * @return string
     */
    public function getDosagem()
    {
        return $this->dosagem;
    }

    /**
     * @param string $dosagem
     */
    public function setDosagem(string $dosagem)
    {
        $this->dosagem = $dosagem;
    }

    /**
     * @return \DateTime
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * @param \DateTime $dataInicio
     */
    public function setDataInicio(\DateTime $dataInicio)
    {
        $this->dataInicio = $dataInicio;
    }

    /**
     * @return \DateTime
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * @param \DateTime $dataFim
     */
    public function setDataFim(\DateTime $dataFim)
    {
        $this->dataFim = $dataFim;
    }

    /**
     * @return string
     */
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * @param string $horario
     */
    public function setHorario(string $horario)
    {
        $this->horario = $horario;
    }


}
