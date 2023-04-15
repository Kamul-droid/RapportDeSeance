<?php

namespace App\Entity\life;

use App\Entity\FicheClient;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ProfilRachidienRepository;

/**
 * @ORM\Entity(repositoryClass=ProfilRachidienRepository::class)
 */
class ProfilRachidien
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

    /**
     * @ORM\ManyToOne(targetEntity=FicheClient::class, inversedBy="rachidien")
     */
    private $ficheClient;

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
