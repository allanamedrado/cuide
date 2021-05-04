<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consulta
 *
 * @ORM\Table(name="consulta")
 * @ORM\Entity
 */
class Consulta
{
    /**
     * @var int
     *
     * @ORM\Column(name="consulta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $consultaId;

    /**
     * @var string
     *
     * @ORM\Column(name="medico", type="string", length=45, nullable=false)
     */
    private $medico;

    /**
     * @var string
     *
     * @ORM\Column(name="especialidade", type="string", length=45, nullable=false)
     */
    private $especialidade;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date", nullable=false)
     */
    private $data;

    /**
     * @var string
     *
     * @ORM\Column(name="hora", type="string", length=45, nullable=false)
     */
    private $hora;

    /**
     * @var string
     *
     * @ORM\Column(name="local", type="string", length=45, nullable=false)
     */
    private $local;

    /**
     * @return int
     */
    public function getConsultaId()
    {
        return $this->consultaId;
    }

    /**
     * @return string
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * @return string
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * @return \DateTime
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param string $medico
     */
    public function setMedico(string $medico): void
    {
        $this->medico = $medico;
    }

    /**
     * @param string $especialidade
     */
    public function setEspecialidade(string $especialidade): void
    {
        $this->especialidade = $especialidade;
    }

    /**
     * @param \DateTime $data
     */
    public function setData(\DateTime $data): void
    {
        $this->data = $data;
    }

    /**
     * @param string $hora
     */
    public function setHora(string $hora): void
    {
        $this->hora = $hora;
    }

    /**
     * @param string $local
     */
    public function setLocal(string $local): void
    {
        $this->local = $local;
    }


    public function toArray()
    {
        return [
            'id' => $this->getConsultaId(),
            'especialidade' => $this->getEspecialidade(),
            'data' => $this->getData(),
            'hora' => $this->getHora(),
            'local' => $this->getLocal(),
            'medico' => $this->getMedico(),
        ];
    }
}
