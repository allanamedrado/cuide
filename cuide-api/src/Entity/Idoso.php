<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idoso
 *
 * @ORM\Table(name="idoso", indexes={@ORM\Index(name="fk_idoso_Usuario1_idx", columns={"Usuario_idUsuario"})})
 * @ORM\Entity
 */
class Idoso
{
    /**
     * @var int
     *
     * @ORM\Column(name="idoso_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idosoId;

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
     * @var \DateTime
     *
     * @ORM\Column(name="data_nascimento", type="date", nullable=false)
     */
    private $dataNascimento;

    /**
     * @var string
     *
     * @ORM\Column(name="endereco", type="string", length=45, nullable=false)
     */
    private $endereco;

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
     * @ORM\ManyToMany(targetEntity="Cuidador", inversedBy="idosoIdoso")
     * @ORM\JoinTable(name="idoso_has_cuidador",
     *   joinColumns={
     *     @ORM\JoinColumn(name="idoso_idoso_id", referencedColumnName="idoso_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="cuidador_cuidador_id", referencedColumnName="cuidador_id")
     *   }
     * )
     */
    private $cuidadorCuidador;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cuidadorCuidador = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
