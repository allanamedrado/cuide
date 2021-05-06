<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sintoma
 *
 * @ORM\Table(name="sintoma", indexes={@ORM\Index(name="fk_sintoma_usuario1_idx", columns={"usuario_idUsuario"}), @ORM\Index(name="fk_sintoma_idoso1_idx", columns={"idoso_idoso_id"})})
 * @ORM\Entity
 */
class Sintoma
{
    /**
     * @var int
     *
     * @ORM\Column(name="sintoma_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $sintomaId;

    /**
     * @var bool
     *
     * @ORM\Column(name="alteracoes", type="boolean", nullable=false)
     */
    private $alteracoes;

    /**
     * @var string
     *
     * @ORM\Column(name="local_alteracoes", type="string", length=45, nullable=false)
     */
    private $localAlteracoes;

    /**
     * @var string
     *
     * @ORM\Column(name="local_dores", type="string", length=45, nullable=false)
     */
    private $localDores;

    /**
     * @var string
     *
     * @ORM\Column(name="observacoes", type="string", length=255, nullable=false)
     */
    private $observacoes;

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
