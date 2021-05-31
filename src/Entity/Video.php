<?php

namespace App\Entity;

use App\Repository\VideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VideoRepository::class)
 */
class Video
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $codigo;

    /**
     * @ORM\ManyToOne(targetEntity=FestivalDestacado::class, inversedBy="videos")
     */
    private $festivalDestacado;

    /**
     * @ORM\ManyToOne(targetEntity=FestivalOtro::class, inversedBy="videos")
     */
    private $festivalOtro;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getFestivalDestacado(): ?FestivalDestacado
    {
        return $this->festivalDestacado;
    }

    public function setFestivalDestacado(?FestivalDestacado $festivalDestacado): self
    {
        $this->festivalDestacado = $festivalDestacado;

        return $this;
    }

    public function getFestivalOtro(): ?FestivalOtro
    {
        return $this->festivalOtro;
    }

    public function setFestivalOtro(?FestivalOtro $festivalOtro): self
    {
        $this->festivalOtro = $festivalOtro;

        return $this;
    }
}
