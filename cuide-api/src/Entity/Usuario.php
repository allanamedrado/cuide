<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 *
 * @ORM\Table(name="usuario", uniqueConstraints={@ORM\UniqueConstraint(name="usuario_UNIQUE", columns={"usuario"})})
 * @ORM\Entity
 */
class Usuario
{
    /**
     * @var int
     *
     * @ORM\Column(name="idUsuario", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=45, nullable=false)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="senha", type="string", length=45, nullable=false)
     */
    private $senha;

    /**
     * @var string
     *
     * @ORM\Column(name="categoria", type="string", length=45, nullable=false)
     */
    private $categoria;

    /**
     * @return int
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }

    /**
     * @param int $idusuario
     */
    public function setIdusuario(int $idusuario)
    {
        $this->idusuario = $idusuario;
    }

    /**
     * @return string
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param string $usuario
     */
    public function setUsuario(string $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return string
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param string $senha
     */
    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    /**
     * @return string
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * @param string $categoria
     */
    public function setCategoria(string $categoria)
    {
        $this->categoria = $categoria;
    }

    public function toArray()
    {
        return [
            'idusuario' => $this->getIdusuario(),
            'usuario' => $this->getUsuario(),
            'categoria' => $this->getCategoria()
        ];
    }

}
