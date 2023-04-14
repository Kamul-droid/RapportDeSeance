<?php

namespace App\Entity\life;

use App\Repository\MiasmesEtAntiVieillissementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MiasmesEtAntiVieillissementRepository::class)
 */
class MiasmesEtAntiVieillissement
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
    private $facteurs_miasmatiques;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facteurs_de_stress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $reaction_age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $facteurs_generaux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFacteursMiasmatiques(): ?string
    {
        return $this->facteurs_miasmatiques;
    }

    public function setFacteursMiasmatiques(string $facteurs_miasmatiques): self
    {
        $this->facteurs_miasmatiques = $facteurs_miasmatiques;

        return $this;
    }

    public function getFacteursDeStress(): ?string
    {
        return $this->facteurs_de_stress;
    }

    public function setFacteursDeStress(string $facteurs_de_stress): self
    {
        $this->facteurs_de_stress = $facteurs_de_stress;

        return $this;
    }

    public function getReactionAge(): ?string
    {
        return $this->reaction_age;
    }

    public function setReactionAge(string $reaction_age): self
    {
        $this->reaction_age = $reaction_age;

        return $this;
    }

    public function getFacteursGeneraux(): ?string
    {
        return $this->facteurs_generaux;
    }

    public function setFacteursGeneraux(string $facteurs_generaux): self
    {
        $this->facteurs_generaux = $facteurs_generaux;

        return $this;
    }
}
