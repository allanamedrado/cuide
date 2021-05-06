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


}
