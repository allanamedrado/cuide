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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Idoso", mappedBy="cuidadorCuidador")
     */
    private $idosoIdoso;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idosoIdoso = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
