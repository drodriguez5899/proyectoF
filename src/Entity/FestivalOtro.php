<?php

namespace App\Entity;

use App\Repository\FestivalOtroRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FestivalOtroRepository::class)
 */
class FestivalOtro
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100000)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foto1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $foto2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $genero;

    /**
     * @ORM\Column(type="string", length=10000)
     */
    private $frase;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(?string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFoto1(): ?string
    {
        return $this->foto1;
    }

    public function setFoto1(string $foto1): self
    {
        $this->foto1 = $foto1;

        return $this;
    }

    public function getFoto2(): ?string
    {
        return $this->foto2;
    }

    public function setFoto2(string $foto2): self
    {
        $this->foto2 = $foto2;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getFrase(): ?string
    {
        return $this->frase;
    }

    public function setFrase(string $frase): self
    {
        $this->frase = $frase;

        return $this;
    }
}
