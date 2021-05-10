<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consulta
 *
 * @ORM\Table(name="consulta", indexes={@ORM\Index(name="fk_consulta_usuario1_idx", columns={"usuario_idUsuario"}), @ORM\Index(name="fk_consulta_idoso1_idx", columns={"idoso_idoso_id"})})
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
    public function getConsultaId()
    {
        return $this->consultaId;
    }

    /**
     * @param int $consultaId
     */
    public function setConsultaId(int $consultaId)
    {
        $this->consultaId = $consultaId;
    }

    /**
     * @return string
     */
    public function getMedico()
    {
        return $this->medico;
    }

    /**
     * @param string $medico
     */
    public function setMedico(string $medico)
    {
        $this->medico = $medico;
    }

    /**
     * @return string
     */
    public function getEspecialidade()
    {
        return $this->especialidade;
    }

    /**
     * @param string $especialidade
     */
    public function setEspecialidade(string $especialidade)
    {
        $this->especialidade = $especialidade;
    }

    /**
     * @return \DateTime
     */
    public function getData(): \DateTime
    {
        return $this->data;
    }

    /**
     * @param \DateTime $data
     */
    public function setData(\DateTime $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param string $hora
     */
    public function setHora(string $hora)
    {
        $this->hora = $hora;
    }

    /**
     * @return string
     */
    public function getLocal()
    {
        return $this->local;
    }

    /**
     * @param string $local
     */
    public function setLocal(string $local)
    {
        $this->local = $local;
    }

    /**
     * @return \Idoso
     */
    public function getIdosoIdoso()
    {
        return $this->idosoIdoso;
    }

    /**
     * @param \Idoso $idosoIdoso
     */
    public function setIdosoIdoso(\Idoso $idosoIdoso)
    {
        $this->idosoIdoso = $idosoIdoso;
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
    public function setUsuarioIdusuario(\Usuario $usuarioIdusuario)
    {
        $this->usuarioIdusuario = $usuarioIdusuario;
    }

    public function toArray()
    {
        return [
            'idconsulta' => $this->getConsultaId(),
            'medico' => $this->getMedico(),
            'especialidade' => $this->getEspecialidade(),
            'data' => $this->getData(),
            'hora' => $this->getHora(),
            'local' => $this->getLocal(),
            'ididoso' => $this->getIdosoIdoso()->getIdosoId(),
            'idusuario' => $this->getUsuarioIdusuario()->getIdusuario()
        ];

    }

}
