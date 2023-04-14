<?php

namespace App\Entity\life;

use App\Repository\ProfilAnimauxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProfilAnimauxRepository::class)
 */
class ProfilAnimaux
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
    private $animaux_familles;

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="animaux")
     */
    private $ficheClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnimauxFamilles(): ?string
    {
        return $this->animaux_familles;
    }

    public function setAnimauxFamilles(string $animaux_familles): self
    {
        $this->animaux_familles = $animaux_familles;

        return $this;
    }

    public function getFicheClient(): ?FicheClient
    {
        return $this->ficheClient;
    }

    public function setFicheClient(?FicheClient $ficheClient): self
    {
        $this->ficheClient = $ficheClient;

        return $this;
    }
}
