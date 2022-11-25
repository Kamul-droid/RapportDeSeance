<?php

namespace App\Entity;

use App\Repository\EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EquilibreHarmoniqueCerveauGaucheCerveauDroitRepository::class)
 */
class EquilibreHarmoniqueCerveauGaucheCerveauDroit
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
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNom();
    }
}