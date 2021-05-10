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

    /**
     * @return int
     */
    public function getSintomaId()
    {
        return $this->sintomaId;
    }

    /**
     * @param int $sintomaId
     */
    public function setSintomaId(int $sintomaId)
    {
        $this->sintomaId = $sintomaId;
    }

    /**
     * @return bool
     */
    public function isAlteracoes()
    {
        return $this->alteracoes;
    }

    /**
     * @param bool $alteracoes
     */
    public function setAlteracoes(bool $alteracoes)
    {
        $this->alteracoes = $alteracoes;
    }

    /**
     * @return string
     */
    public function getLocalAlteracoes()
    {
        return $this->localAlteracoes;
    }

    /**
     * @param string $localAlteracoes
     */
    public function setLocalAlteracoes(string $localAlteracoes)
    {
        $this->localAlteracoes = $localAlteracoes;
    }

    /**
     * @return string
     */
    public function getLocalDores()
    {
        return $this->localDores;
    }

    /**
     * @param string $localDores
     */
    public function setLocalDores(string $localDores)
    {
        $this->localDores = $localDores;
    }

    /**
     * @return string
     */
    public function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * @param string $observacoes
     */
    public function setObservacoes(string $observacoes)
    {
        $this->observacoes = $observacoes;
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
            'idsintoma' => $this->getSintomaId(),
            'alteracoes' => $this->isAlteracoes(),
            'local_alteracoes' => $this->getLocalAlteracoes(),
            'local_dores' => $this->getLocalAlteracoes(),
            'observacoes' => $this->getObservacoes(),
            'ididoso' => $this->getIdosoIdoso()->getIdosoId(),
            'idusuario' => $this->getUsuarioIdusuario()->getIdusuario()
        ];
    }

}
