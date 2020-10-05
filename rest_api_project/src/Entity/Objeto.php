<?php

namespace App\Entity;

use App\Repository\ObjetoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ObjetoRepository::class)
 */
class Objeto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $propiedad;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getPropiedad(): ?string
    {
        return $this->propiedad;
    }

    public function setPropiedad(string $propiedad): self
    {
        $this->propiedad = $propiedad;

        return $this;
    }
}
