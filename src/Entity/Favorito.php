<?php

namespace App\Entity;

use App\Repository\FavoritoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FavoritoRepository::class)
 */
class Favorito
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="favoritos")
     */
    private $usuario;

    /**
     * @ORM\ManyToOne(targetEntity=FestivalDestacado::class, inversedBy="favoritos")
     */
    private $festDestacado;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
     public function addDestacado(FestivalDestacado $destacado): self
    {
        if ($this->festDestacado->contains($destacado)) {
            $this->festDestacado[] = $destacado;
        }

        return $this;
    }

    public function removeDestacado(FestivalDestacado $destacado): self
    {
        $this->festDestacado->removeElement($destacado);

        return $this;
    }
     public function getFestDestacado(): ?FestivalDestacado
    {
        return $this->festDestacado;
    }

    public function setFestDestacado(?FestivalDestacado $destacado): self
    {
        $this->festDestacado = $destacado;

        return $this;
    }

    

   
}
