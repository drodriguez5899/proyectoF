<?php

namespace App\Entity;

use App\Repository\FestivalDestacadoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FestivalDestacadoRepository::class)
 */
class FestivalDestacado
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
     * @ORM\Column(type="string", length=10000, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\Column(type="string", length=1000, nullable=true)
     */
    private $frase;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $foto;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lugar;

    /**
     * @ORM\OneToMany(targetEntity=Favorito::class, mappedBy="festDestacado")
     */
    private $favoritos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $video;

    /**
     * @ORM\OneToMany(targetEntity=Video::class, mappedBy="festivalDestacado")
     */
    private $videos;

    public function __construct()
    {
        $this->favoritos = new ArrayCollection();
        $this->videos = new ArrayCollection();
    }

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

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getFrase(): ?string
    {
        return $this->frase;
    }

    public function setFrase(?string $frase): self
    {
        $this->frase = $frase;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->foto;
    }

    public function setFoto(?string $foto): self
    {
        $this->foto = $foto;

        return $this;
    }

    public function getLugar(): ?string
    {
        return $this->lugar;
    }

    public function setLugar(string $lugar): self
    {
        $this->lugar = $lugar;

        return $this;
    }

    /**
     * @return Collection|Favorito[]
     */
    public function getFavoritos(): Collection
    {
        return $this->favoritos;
    }

    public function addFavorito(Favorito $favorito): self
    {
        if (!$this->favoritos->contains($favorito)) {
            $this->favoritos[] = $favorito;
            $favorito->addDestacado($this);
        }

        return $this;
    }

    public function removeFavorito(Favorito $favorito): self
    {
        if ($this->favoritos->removeElement($favorito)) {
            $favorito->removeDestacado($this);
        }

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->video;
    }

    public function setVideo(?string $video): self
    {
        $this->video = $video;

        return $this;
    }

    /**
     * @return Collection|Video[]
     */
    public function getVideos(): Collection
    {
        return $this->videos;
    }

    public function addVideo(Video $video): self
    {
        if (!$this->videos->contains($video)) {
            $this->videos[] = $video;
            $video->setFestivalDestacado($this);
        }

        return $this;
    }

    public function removeVideo(Video $video): self
    {
        if ($this->videos->removeElement($video)) {
            // set the owning side to null (unless already changed)
            if ($video->getFestivalDestacado() === $this) {
                $video->setFestivalDestacado(null);
            }
        }

        return $this;
    }
}
