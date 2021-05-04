<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sintoma
 *
 * @ORM\Table(name="sintoma")
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
     * @return int
     */
    public function getSintomaId(): int
    {
        return $this->sintomaId;
    }

    /**
     * @param int $sintomaId
     */
    public function setSintomaId(int $sintomaId): void
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


}
