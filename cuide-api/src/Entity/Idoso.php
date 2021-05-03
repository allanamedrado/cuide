<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idoso
 *
 * @ORM\Table(name="idoso", indexes={@ORM\Index(name="fk_idoso_exame1_idx", columns={"exame_exame_id"}), @ORM\Index(name="fk_idoso_consulta1_idx", columns={"consulta_consulta_id"}), @ORM\Index(name="fk_idoso_sintoma1_idx", columns={"sintoma_sintoma_id"}), @ORM\Index(name="fk_idoso_medicamento1_idx", columns={"medicamento_medicamento_id"})})
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
     * @var \Consulta
     *
     * @ORM\ManyToOne(targetEntity="Consulta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="consulta_consulta_id", referencedColumnName="consulta_id")
     * })
     */
    private $consultaConsulta;

    /**
     * @var \Exame
     *
     * @ORM\ManyToOne(targetEntity="Exame")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="exame_exame_id", referencedColumnName="exame_id")
     * })
     */
    private $exameExame;

    /**
     * @var \Medicamento
     *
     * @ORM\ManyToOne(targetEntity="Medicamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="medicamento_medicamento_id", referencedColumnName="medicamento_id")
     * })
     */
    private $medicamentoMedicamento;

    /**
     * @var \Sintoma
     *
     * @ORM\ManyToOne(targetEntity="Sintoma")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sintoma_sintoma_id", referencedColumnName="sintoma_id")
     * })
     */
    private $sintomaSintoma;

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

    /**
     * @return int
     */
    public function getIdosoId()
    {
        return $this->idosoId;
    }

    /**
     * @param int $idosoId
     */
    public function setIdosoId(int $idosoId)
    {
        $this->idosoId = $idosoId;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param string $cpf
     */
    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     */
    public function setDataNascimento(\DateTime $dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param string $endereco
     */
    public function setEndereco(string $endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return \Consulta
     */
    public function getConsultaConsulta()
    {
        return $this->consultaConsulta;
    }

    /**
     * @param \Consulta $consultaConsulta
     */
    public function setConsultaConsulta(\Consulta $consultaConsulta)
    {
        $this->consultaConsulta = $consultaConsulta;
    }

    /**
     * @return \Exame
     */
    public function getExameExame()
    {
        return $this->exameExame;
    }

    /**
     * @param \Exame $exameExame
     */
    public function setExameExame(\Exame $exameExame)
    {
        $this->exameExame = $exameExame;
    }

    /**
     * @return \Medicamento
     */
    public function getMedicamentoMedicamento()
    {
        return $this->medicamentoMedicamento;
    }

    /**
     * @param \Medicamento $medicamentoMedicamento
     */
    public function setMedicamentoMedicamento(\Medicamento $medicamentoMedicamento)
    {
        $this->medicamentoMedicamento = $medicamentoMedicamento;
    }

    /**
     * @return \Sintoma
     */
    public function getSintomaSintoma()
    {
        return $this->sintomaSintoma;
    }

    /**
     * @param \Sintoma $sintomaSintoma
     */
    public function setSintomaSintoma(\Sintoma $sintomaSintoma)
    {
        $this->sintomaSintoma = $sintomaSintoma;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCuidadorCuidador()
    {
        return $this->cuidadorCuidador;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $cuidadorCuidador
     */
    public function setCuidadorCuidador($cuidadorCuidador): void
    {
        $this->cuidadorCuidador = $cuidadorCuidador;
    }



}
