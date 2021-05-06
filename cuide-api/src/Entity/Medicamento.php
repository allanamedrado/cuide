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


}
